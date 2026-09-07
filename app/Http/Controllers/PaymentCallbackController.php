<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentCallbackController extends Controller
{
    public function handleNotification(Request $request)
    {
        // 1. Ambil data JSON yang dikirim oleh Payment Gateway
        $payload = $request->all();

        // 2. Validasi Signature Key (SANGAT PENTING UNTUK KEAMANAN!)
        // Anda harus mencocokkan signature_key dari Midtrans dengan rumus SHA512
        // (order_id + status_code + gross_amount + server_key)
        // Ini memastikan request ini valid dan bukan dari hacker.

        $orderId = $payload['order_id']; // Misalnya Anda jadikan UUID sebagai order_id
        $transactionStatus = $payload['transaction_status'];

        // 3. Cari Data Order
        $order = Order::where('uuid', $orderId)->first();

        if (!$order) {
            return response()->json(['message' => 'Order tidak ditemukan'], 404);
        }

        // 4. Update Status Pembayaran berdasarkan Respon
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            // PEMBAYARAN SUKSES
            $order->payment_status = 'paid';
            $order->save();
            
            Log::info("Pesanan Jaywashoe {$orderId} telah dibayar LUNAS.");
        } 
        elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            // PEMBAYARAN GAGAL/EXPIRED
            $order->payment_status = 'failed';
            $order->save();
        }

        // Berikan respon HTTP 200 OK ke Midtrans agar mereka tahu webhook telah diterima
        return response()->json(['message' => 'Notification processed']);
    }
}