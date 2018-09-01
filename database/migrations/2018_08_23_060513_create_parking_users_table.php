<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nama_lengkap', 50);
            $table->string('email', 100);
            $table->string('telepon', 20)->unique();
            $table->integer('kode_keamanan');
            $table->integer('balance');
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
        Schema::dropIfExists('parking_users');
    }
}
