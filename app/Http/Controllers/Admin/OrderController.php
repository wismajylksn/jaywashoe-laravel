<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $order->update([
            'tracking_status' => $request->tracking_status,
            'payment_status' => $request->payment_status
        ]);

        return back()->with('success', 'Status pesanan ' . $order->customer_name . ' berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('success', 'Data pesanan berhasil dihapus!');
    }
}