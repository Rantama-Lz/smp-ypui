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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable()->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('foto')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete()->cascadeOnDelete();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
