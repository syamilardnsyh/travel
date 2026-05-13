<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('paket_wisata_id')->references('id')->on('paket_wisata')->onDelete('cascade');
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->date('tanggal');
            $table->integer('jumlah_orang');
            $table->bigInteger('total_harga');
            $table->string('status')->default('pending');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
