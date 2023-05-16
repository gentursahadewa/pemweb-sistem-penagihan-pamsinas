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
        Schema::create('penggunaan_air', function (Blueprint $table) {
            $table->id('id_penggunaan_air')->unique();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_petugas');
            $table->string('bulan_penggunaan', 25);
            $table->double('debit_air', 17, 2);

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
        Schema::dropIfExists('penggunaan_air');
    }
};
