<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\Promo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap; 

class OrderController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('orders.create', compact('services'));
    }

public function store(Request $request)
    {
        // 1. Validasi Input Ketat
        $request->validate([
            'honeypot_bot_trap' => 'prohibited', // 👈 Jika terisi, otomatis ditolak!
            'customer_name'     => 'required|string|max:50|regex:/^[a-zA-Z\s]+$/',
            'items'          => 'required|array',
        ], [
            'customer_name.regex' => 'Nama hanya boleh berisi huruf.',
            'customer_phone.digits_between' => 'Nomor WhatsApp harus valid (10-15 angka).'
        ]);

        // 2. Filter Layanan yang Dipilih (Kuantitas > 0)
        $selectedItems = array_filter($request->items ?? [], function($qty) {
            return $qty > 0;
        });

        if (empty($selectedItems)) {
            return back()->withErrors(['Minimal pilih satu layanan dengan jumlah 1!']);
        }

        // 3. Kalkulasi Total Harga & Siapkan Data Item
        $totalAmount = 0;
        $orderItemsData = [];

        foreach ($selectedItems as $serviceId => $qty) {
            $service = Service::findOrFail($serviceId);
            $totalAmount += ($service->price * $qty);
            
            $orderItemsData[] = [
                'service_id' => $service->id,
                'quantity'   => $qty,
                'price'      => $service->price
            ];
        }

        // 4. Cek & Terapkan Kode Promo
        $discountAmount = 0;
        $appliedPromoCode = null;

        if ($request->filled('promo_code')) {
            $promo = Promo::where('code', strtoupper($request->promo_code))
                          ->where('is_active', true)
                          ->first();

            // Jika promo valid dan belum kedaluwarsa
            if ($promo && (!$promo->expired_at || \Carbon\Carbon::today()->lte($promo->expired_at))) {
                $appliedPromoCode = $promo->code;
                
                if ($promo->type == 'percent') {
                    $discountAmount = $totalAmount * ($promo->discount_value / 100);
                } else {
                    $discountAmount = $promo->discount_value;
                }

                // Cegah diskon minus (jika diskon lebih besar dari tagihan)
                if ($discountAmount > $totalAmount) {
                    $discountAmount = $totalAmount;
                }

                // Kurangi Total Harga dengan Diskon
                $totalAmount -= $discountAmount;
            }
        }

        // 5. TRANSAKSI DATABASE (Proteksi Data)
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();

            // Simpan Data Order Utama
            $order = Order::create([
                'uuid'            => \Illuminate\Support\Str::uuid(),
                'customer_name'   => $request->customer_name,
                'customer_phone'  => $request->customer_phone,
                'total_amount'    => $totalAmount,
                'promo_code'      => $appliedPromoCode,
                'discount_amount' => $discountAmount,
                'payment_status'  => 'unpaid',
                'tracking_status' => 'belum_bayar',
                'snap_token'      => null
            ]);

            // Simpan Data Rincian Layanan (Item)
            $order->items()->createMany($orderItemsData);

            \Illuminate\Support\Facades\DB::commit();

            // Redirect ke Halaman Tracking
            return redirect()->route('order.track', $order->uuid);
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            // Pesan error ditambahkan $e->getMessage() agar jika gagal, Anda tahu penyebab teknisnya
            return back()->withErrors('Terjadi kesalahan saat menyimpan pesanan. Detail: ' . $e->getMessage());
        }
    }

    public function showTracking($uuid)
    {
        $order = Order::with('items.service')->where('uuid', $uuid)->firstOrFail();
        
        $showPaymentButton = false;
        $snapToken = null; 

        if ($order->payment_status === 'unpaid') {
            $showPaymentButton = true;
            
            // CEK: Apakah pesanan ini sudah punya token Midtrans?
            if ($order->snap_token) {
                // Jika sudah ada, gunakan token yang lama (agar tidak error saat di-refresh)
                $snapToken = $order->snap_token;
            } else {
                // Jika belum ada, minta token baru ke Midtrans
                \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
                \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
                \Midtrans\Config::$isSanitized = true;
                \Midtrans\Config::$is3ds = true;

                $midtransItems = [];
                foreach ($order->items as $item) {
                    $midtransItems[] = [
                        'id' => $item->service_id,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'name' => $item->service->name ?? 'Layanan'
                    ];
                }

                $params = [
                    'transaction_details' => [
                        'order_id' => $order->uuid,
                        'gross_amount' => $order->total_amount,
                    ],
                    'item_details' => $midtransItems,
                    'customer_details' => [
                        'first_name' => $order->customer_name,
                        'phone' => $order->customer_phone,
                    ]
                ];

                $snapToken = \Midtrans\Snap::getSnapToken($params); 
                
                // SIMPAN token yang baru didapat ke database
                $order->update(['snap_token' => $snapToken]);
            }
        }

        return view('orders.tracking', compact('order', 'showPaymentButton', 'snapToken'));
    }

    public function callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $order = Order::where('uuid', $request->order_id)->first();
                if ($order) {
                $order->update([
                    'payment_status' => 'paid',
                    // OTOMATIS BERUBAH JIKA LUNAS:
                    'tracking_status' => 'ready_to_pickup' 
                ]);
            }
            }
        }
        return response()->json(['message' => 'Callback diterima']);
    }

    public function checkPromo(Request $request)
    {
        // Cari promo berdasarkan kode (abaikan huruf besar/kecil)
        $promo = Promo::where('code', strtoupper($request->promo_code))->first();

        // 1. Jika kode tidak ada atau sedang dinonaktifkan
        if (!$promo || !$promo->is_active) {
            return response()->json([
                'valid' => false, 
                'message' => 'Kode promo tidak ditemukan atau sedang tidak aktif.'
            ]);
        }

        // 2. Jika promo punya batas waktu dan sudah lewat
        if ($promo->expired_at && Carbon::today()->gt($promo->expired_at)) {
            return response()->json([
                'valid' => false, 
                'message' => 'Yah, kode promo ini sudah kedaluwarsa.'
            ]);
        }

        // 3. Jika berhasil
        return response()->json([
            'valid' => true,
            'message' => 'Yey! Promo berhasil diterapkan.',
            'type' => $promo->type,
            'value' => $promo->discount_value,
            'code' => $promo->code
        ]);
    }
}