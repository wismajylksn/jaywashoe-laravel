<?php

use App\Models\Service; 
use App\Http\Controllers\ProfileController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;


Route::get('/', function () {
    // Jika admin mengakses halaman utama, arahkan ke dashboard
    if (auth()->check()) {
        return redirect('/admin/dashboard');
    }
    
    $services = Service::all();
    return view('welcome', compact('services'));
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/buat-pesanan', [OrderController::class, 'create'])->name('order.create');
Route::post('/buat-pesanan', [OrderController::class, 'store'])->name('order.store');

Route::get('/track-order/{uuid}', [OrderController::class, 'showTracking'])->name('order.track');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Menu Utama (Dashboard)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Kelola Layanan (CRUD)
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');

    // Kelola Pesanan
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update');
    
    // TAMBAHKAN BARIS INI (YANG SEBELUMNYA TERTINGGAL):
    Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
});

Route::post('/midtrans/callback', [App\Http\Controllers\OrderController::class, 'callback']);

require __DIR__.'/auth.php';
