<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data Statistik (Card)
        $totalPemasukan = Order::where('tracking_status', 'sukses')->sum('total_amount');
        $totalPesanan = Order::count();
        
        // 2. Data Tabel Pesanan (Terbaru di atas)
        $orders = Order::latest()->get();
        
        // Kirim semua data ke satu view dashboard
        return view('admin.dashboard', compact('totalPemasukan', 'totalPesanan', 'orders'));
    }
}
