<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->string('no_parkir', 30)->primary();
            $table->string('id_parking_lot', 30);
            $table->string('id_user', 20);
            $table->dateTime('jam_masuk');
            $table->dateTime('jam_keluar');
            $table->bigInteger('durasi');
            $table->integer('total_biaya');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkings');
    }
}
