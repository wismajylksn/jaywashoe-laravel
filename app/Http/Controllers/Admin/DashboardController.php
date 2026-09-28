<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil nilai filter dari URL (default: 'semua')
        $filter = $request->input('filter', 'semua');

        // 2. Siapkan query dasar untuk mengambil semua pesanan
        $query = Order::query();

        // 3. Terapkan filter waktu menggunakan Carbon
        if ($filter == 'hari_ini') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($filter == 'minggu_ini') {
            // UBAH DI SINI: Mengambil data dari 7 hari yang lalu pada jam 00:00:00 hingga hari ini
            $query->where('created_at', '>=', Carbon::today()->subDays(7));
        } elseif ($filter == 'bulan_ini') {
            // Tetap sama: mengambil data di bulan dan tahun yang berjalan ini
            $query->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
        } elseif ($filter == 'tahun_ini') {
            $query->whereYear('created_at', Carbon::now()->year);
        }

        // 4. Hitung Total Pesanan Masuk (berdasarkan filter)
        $totalPesanan = $query->count();

        // 5. Hitung Saldo Pemasukan (berdasarkan filter DAN hanya yang sudah lunas/paid)
        // Kita clone query-nya agar filter waktunya tetap terbawa, tapi ditambah filter status 'paid'
        $totalPemasukan = (clone $query)->where('payment_status', 'paid')->sum('total_amount');

        // 6. Ambil data pesanannya (Maksimal 10 pesanan terbaru sesuai filter waktu)
        $recentOrders = (clone $query)->with('items.service')->latest()->limit(10)->get();

        // 7. Kirim data ke tampilan (view)
        return view('admin.dashboard', compact('totalPesanan', 'totalPemasukan', 'filter', 'recentOrders'));
    }
}