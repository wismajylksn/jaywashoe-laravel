<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        Service::create($request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]));
        return back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return back()->with('success', 'Layanan dihapus!');
    }
    public function update(Request $request, Service $service)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
    ]);

    $service->update($request->only('name', 'price'));

    return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
}
}
