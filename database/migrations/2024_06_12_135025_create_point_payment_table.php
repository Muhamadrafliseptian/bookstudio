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
        Schema::create('point_payment', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->enum("status", ["Sudah di Ambil", "Belum di Ambil"]);
            $table->integer("point");
            $table->date("acc_point")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_payment');
    }
};
