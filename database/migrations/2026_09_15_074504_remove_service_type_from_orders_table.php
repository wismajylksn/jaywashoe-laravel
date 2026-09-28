<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Membuang kolom service_type karena sudah digantikan oleh tabel order_items
            $table->dropColumn('service_type');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Mengembalikan kolom jika kita melakukan rollback
            $table->string('service_type')->nullable(); 
        });
    }
};