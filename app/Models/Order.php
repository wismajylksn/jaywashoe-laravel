<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Tambahkan ini agar field bisa diisi
    protected $fillable = [
        'uuid',
        'customer_name',
        'customer_phone',
        'service_type',
        'total_amount',
        'payment_status',
        'tracking_status'
    ];
}