<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
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
        // 1. Validasi
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id'
        ]);

        // 2. Ambil layanan
        $service = Service::findOrFail($request->service_id);

        // 3. Simpan Pesanan (Tanpa perlu simpan snap_token ke database)
        $order = Order::create([
            'uuid' => Str::uuid(),
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'service_type' => $service->name, 
            'total_amount' => $service->price,
            'payment_status' => 'unpaid',
            'tracking_status' => 'pickup'
        ]);

        return redirect()->route('order.track', $order->uuid);
    }

    public function showTracking($uuid)
    {
        $order = Order::where('uuid', $uuid)->firstOrFail();
        
        $showPaymentButton = false;
        $snapToken = null; 

        if ($order->payment_status === 'unpaid') {
            $showPaymentButton = true;
            
            Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => $order->uuid,
                    'gross_amount' => $order->total_amount,
                ],
                'customer_details' => [
                    'first_name' => $order->customer_name,
                    'phone' => $order->customer_phone,
                ]
            ];

            // Request Token otomatis saat halaman dibuka
            $snapToken = Snap::getSnapToken($params); 
        }

        // Pastikan nama file view Anda benar (orders.track atau orders.tracking)
        return view('orders.tracking', compact('order', 'showPaymentButton', 'snapToken'));
    }
    public function callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        
        // Verifikasi keaslian pesan dari Midtrans
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $order = Order::where('uuid', $request->order_id)->first();
                
                if ($order) {
                    $order->update(['payment_status' => 'paid']);
                }
            }
        }
        
        // Beri tahu Midtrans bahwa pesan sudah diterima
        return response()->json(['message' => 'Callback diterima']);
    }
}