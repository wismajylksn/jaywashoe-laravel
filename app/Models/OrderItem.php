<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Mengizinkan kolom ini diisi secara massal saat membuat pesanan
    protected $fillable = [
        'order_id',
        'service_id',
        'quantity',
        'price'
    ];

    // Relasi balik ke Order Induk
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi ke Layanan yang dipilih
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}