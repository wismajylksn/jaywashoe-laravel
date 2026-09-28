<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // 1. Menampilkan daftar layanan
    public function index()
    {
        // Menggunakan get() karena data jenis layanan biasanya tidak sampai ratusan
        // sehingga tidak butuh pagination yang rumit
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    // 2. Menyimpan layanan baru (dari Modal Tambah)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        Service::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return back()->with('success', 'Layanan baru berhasil ditambahkan!');
    }

    // 3. Memperbarui layanan (dari Modal Edit)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        $service = Service::findOrFail($id);
        
        $service->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return back()->with('success', 'Data layanan berhasil diperbarui!');
    }

    // 4. Menghapus layanan
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return back()->with('success', 'Layanan berhasil dihapus!');
    }
}