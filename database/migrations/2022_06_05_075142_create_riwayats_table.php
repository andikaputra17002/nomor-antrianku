<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien')->nullable();
            $table->string('nama_dokter')->nullable();
            $table->string('jam_praktek')->nullable();
            $table->string('tangga_pendaftaran')->nullable();
            $table->string('transaksi')->nullable();
            $table->string('antrian')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayats');
    }
}
