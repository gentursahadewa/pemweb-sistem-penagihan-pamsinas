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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan')->unique();
            $table->unsignedBigInteger('id_admin');
            $table->string('jenis_pengguna',25);
            $table->string('nama_pelanggan', 100);
            $table->string('email_pelanggan', 50);
            $table->string('password_pelanggan', 25);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);

            $table->foreign('id_admin')->references('id_admin')->on('administrator');
            $table->foreign('jenis_pengguna')->references('jenis_pengguna')->on('jenis_pengguna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
