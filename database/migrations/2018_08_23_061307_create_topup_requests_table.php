<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopupRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topup_requests', function (Blueprint $table) {
           $table->increments('id_topup_request');
            $table->integer('id_user');
            $table->integer('nominal');
            $table->integer('unicode')->unique();
            $table->integer('nominal_transfer');
            $table->dateTime('waktu_request');
            $table->dateTime('waktu_expired');
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
        Schema::dropIfExists('topup_requests');
    }
}
