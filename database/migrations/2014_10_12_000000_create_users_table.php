<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->integer('id_lokasi');
            $table->integer('id_bo');
<<<<<<< HEAD
            $table->string('username')unique();
=======
            $table->string('username')->unique();
>>>>>>> upstream/front
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level_user');
            $table->rememberToken()->nullable();
            $table->timestamps()->nullable();
            $table->tinyInteger('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
