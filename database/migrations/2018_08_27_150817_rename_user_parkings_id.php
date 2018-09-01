<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameUserParkingsId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parking_users', function (Blueprint $table) {
            $table->renameColumn('id_user', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parking_users', function (Blueprint $table) {
            $table->renameColumn('id', 'id_user');
        });
    }
}
