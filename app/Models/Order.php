<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'customer_name',
        'customer_phone',
        // 'service_type' dihapus karena sekarang menggunakan relasi items()
        'total_amount',
        'promo_code',
        'discount_amount',
        'payment_status',
        'tracking_status',
        'snap_token'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}