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
        Schema::table('motors', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('harga_sewa');
            // nullable() supaya kolom ini bisa kosong, after('harga_sewa') supaya posisinya setelah kolom harga_sewa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
};
