<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_transaction', function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->string('paket_id');
            $table->string('external_id');
            $table->string('invoice_url');
            $table->string('payment_status');
            $table->string('payment_channel')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('tanggal_pesan');
            $table->string('kode_booking')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transaction');
    }
};
