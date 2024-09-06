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
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();

            $table->string('nama_wisata');
            $table->text('lokasi_wisata');
            $table->text('latitude');
            $table->text('longitude');
            $table->longText('deskripsi_wisata');
            $table->string('kategori_wisata');
            $table->text('foto_wisata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
