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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal_bayar');
            $table->integer('jumlah_bayar');
            $table->string('buktibayar')->nullable();
            $table->enum('metode_bayar', ['Tunai','Transfer']);
            $table->enum('status', ['Menunggu Validasi','Sudah Validasi', 'Ditolak'])->default('Menunggu Validasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
