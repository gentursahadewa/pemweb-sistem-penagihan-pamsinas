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
        Schema::create('kasir', function (Blueprint $table) {
            $table->id('id_kasir')->unique();
            $table->unsignedBigInteger('id_admin');
            $table->string('nama_kasir', 100);
            $table->string('password_kasir',25);

            $table->foreign('id_admin')->references('id_admin')->on('administrator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir');
    }
};
