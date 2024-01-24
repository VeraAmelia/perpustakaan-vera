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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('judul');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('penerbit_id');
            $table->foreign('penerbit_id')->references('id')->on('penerbits')->onDelete('cascade')->onUpdate('cascade');
            $table->string('isbn');
            $table->string('pengarang');
            $table->integer('jumlah_halaman');
            $table->integer('tahun_terbit');
            $table->text('sinopsis');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
