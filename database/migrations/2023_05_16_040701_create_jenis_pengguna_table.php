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
        Schema::create('jenis_pengguna', function (Blueprint $table) {
            $table->string('jenis_pengguna', 25)->primary();
            $table->unsignedBigInteger('id_admin');
            $table->double('biaya_tarif', 17, 2);

            $table->foreign('id_admin')->references('id_admin')->on('administrator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pengguna');
    }
};
