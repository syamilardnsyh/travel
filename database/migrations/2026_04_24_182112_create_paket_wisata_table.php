<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->integer('harga');
            $table->string('destinasi');
            $table->string('durasi');
            $table->string('gambar_paket'); 
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_wisata');
    }
};
