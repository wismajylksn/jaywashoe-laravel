<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        // Mengambil semua data promo dari yang terbaru
        $promos = Promo::latest()->get();
        return view('admin.promos.index', compact('promos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:promos', // Kode tidak boleh sama
            'type' => 'required|in:fixed,percent',
            'discount_value' => 'required|integer|min:1',
            'expired_at' => 'nullable|date'
        ]);

        Promo::create([
            'name' => $request->name,
            'code' => strtoupper(str_replace(' ', '', $request->code)), // Pastikan huruf besar & tanpa spasi
            'type' => $request->type,
            'discount_value' => $request->discount_value,
            'expired_at' => $request->expired_at,
            'is_active' => true
        ]);

        return back()->with('success', 'Kode Promo baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:promos,code,'.$id,
            'type' => 'required|in:fixed,percent',
            'discount_value' => 'required|integer|min:1',
            'is_active' => 'required|boolean',
            'expired_at' => 'nullable|date'
        ]);

        $promo = Promo::findOrFail($id);
        $promo->update([
            'name' => $request->name,
            'code' => strtoupper(str_replace(' ', '', $request->code)),
            'type' => $request->type,
            'discount_value' => $request->discount_value,
            'is_active' => $request->is_active,
            'expired_at' => $request->expired_at
        ]);

        return back()->with('success', 'Data Promo berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Promo::findOrFail($id)->delete();
        return back()->with('success', 'Kode Promo berhasil dihapus!');
    }
}