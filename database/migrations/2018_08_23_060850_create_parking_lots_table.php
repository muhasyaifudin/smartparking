<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_lots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tempat', 100);
            $table->string('lokasi', 100);
            $table->string('lat', 50);
            $table->string('lon', 50);
            $table->integer('kapasitas');
            $table->integer('kapasitas_tersedia');
            $table->integer('biaya');
            $table->integer('biaya_akumulasi');
            $table->string('gerbang', 30);
            $table->integer('status');
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
        Schema::dropIfExists('parking_lots');
    }
}
