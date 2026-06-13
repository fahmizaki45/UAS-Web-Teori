<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penulis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->timestamps();
        });

        Schema::create('kategori_artikel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->timestamps();
        });

        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->string('gambar')->nullable();
            $table->foreignId('id_penulis')->constrained('penulis')->onDelete('cascade');
            $table->foreignId('id_kategori')->constrained('kategori_artikel')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikel');
        Schema::dropIfExists('kategori_artikel');
        Schema::dropIfExists('penulis');
    }
};
