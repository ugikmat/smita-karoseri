<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bos', function (Blueprint $table) {
            $table->increments('id_bo');
            $table->integer('id_ho');
            $table->string('kode_bo');
            $table->string('nama_bo');
            $table->string('no_hp_sub_master_dompul');
            $table->tinyInteger('status_bo')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bos');
    }
}
