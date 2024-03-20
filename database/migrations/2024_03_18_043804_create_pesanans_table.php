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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade');
            $table->foreignId('rumahsakit_id')->constrained('rumahsakits')->onDelete('cascade');
            $table->foreignId('supir_id')->constrained('supirs')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->string('nama_pasien');
            $table->string('alamat_jemput')->nullable();
            // longitude
            $table->string('longitude_jemput')->nullable();
            // latitude
            $table->string('latitude_jemput')->nullable();
            $table->string('no_telp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
