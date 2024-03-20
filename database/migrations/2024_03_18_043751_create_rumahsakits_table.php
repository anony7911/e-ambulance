<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rumahsakits', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            // longitude
            $table->string('longitude')->nullable();
            // latitude
            $table->string('latitude')->nullable();
            // province_id
            $table->bigInteger('province_id')->constrained('provinces')->onDelete('cascade');
            // regency_id
            $table->bigInteger('regency_id')->constrained('regencies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumahsakits');
    }
};
