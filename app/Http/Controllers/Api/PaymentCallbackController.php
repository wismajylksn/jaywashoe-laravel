<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentCallbackController extends Controller
{
    public function handleNotification(Request $request)
    {
        // 1. Ambil data JSON dari Midtrans
        $payload = $request->getContent();
        $notification = json_decode($payload);

        // 2. Validasi Keamanan (Signature Key)
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . $serverKey);

        if ($notification->signature_key !== $validSignatureKey) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // 3. Cari Pesanan di Database
        $order = Order::where('uuid', $notification->order_id)->first();
        
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // 4. Update Status Pembayaran
        if ($notification->transaction_status == 'settlement' || $notification->transaction_status == 'capture') {
            $order->payment_status = 'paid';
            Log::info("Order lunas: " . $order->uuid);
        } else if (in_array($notification->transaction_status, ['cancel', 'deny', 'expire'])) {
            $order->payment_status = 'failed';
        }
        
        $order->save();

        return response()->json(['message' => 'Success'], 200);
    }
}