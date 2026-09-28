<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Cek cerdas: Jika kolom promo_code belum ada, baru buat
            if (!Schema::hasColumn('orders', 'promo_code')) {
                $table->string('promo_code')->nullable()->after('total_amount');
            }
            
            // Cek cerdas: Jika kolom discount_amount belum ada, baru buat
            if (!Schema::hasColumn('orders', 'discount_amount')) {
                $table->integer('discount_amount')->default(0)->after('promo_code');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['promo_code', 'discount_amount']);
        });
    }
};