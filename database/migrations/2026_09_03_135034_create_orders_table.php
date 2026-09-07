<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // Token unik untuk URL publik
            
            // Data Pelanggan & Layanan
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('service_type'); // Contoh: Deep Clean, Unyellowing
            $table->decimal('total_amount', 12, 2);
            
            // Status Logika Inti
            $table->enum('payment_status', ['unpaid', 'paid', 'failed'])->default('unpaid');
            $table->string('tracking_status')->default('pickup');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};