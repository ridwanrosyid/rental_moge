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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('motor_id');
            $table->string('nama_penyewa');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->decimal('total_biaya', 10, 2);
            $table->enum('status', ['berlangsung', 'selesai'])->default('berlangsung');
            $table->timestamps();

            // Relasi ke tabel motor
            $table->foreign('motor_id')->references('id')->on('motors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
