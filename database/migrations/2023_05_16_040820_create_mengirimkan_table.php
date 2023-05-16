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
        Schema::create('mengirimkan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_tagihan');

            $table->primary(['id_pelanggan','id_petugas','id_tagihan']);

            $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas_meteran');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengirimkan');
    }
};
