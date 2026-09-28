<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data pesanan dengan relasi items dan service
        $orders = Order::with('items.service') 
            ->when($search, function ($query, $search) {
                // Fitur Pencarian Super (Nama, Resi, atau No. WA)
                return $query->where('customer_name', 'like', "%{$search}%")
                             ->orWhere('uuid', 'like', "%{$search}%")
                             ->orWhere('customer_phone', 'like', "%{$search}%");
            })
            ->latest() // Urutkan dari pesanan paling baru
            ->paginate(10); // Menampilkan 10 pesanan per halaman

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