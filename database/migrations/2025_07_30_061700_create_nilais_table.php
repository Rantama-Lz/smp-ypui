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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_kelas_id')->constrained()->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('tahun_ajaran_id')->constrained()->cascadeOnDelete();
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->integer('nilai_harian')->nullable();
            $table->integer('nilai_uts')->nullable();
            $table->integer('nilai_uas')->nullable();   
            $table->integer('nilai_akhir')->nullable();          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
