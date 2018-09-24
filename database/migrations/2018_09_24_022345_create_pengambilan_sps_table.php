<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengambilanSpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengambilan_sps', function (Blueprint $table) {
            $table->increments('id_pengambilan_sp');
            $table->integer('id_sales');
            // $table->integer('id_ho');
            // $table->integer('id_bo');
            $table->integer('id_lokasi');
            $table->string('id_user');
            $table->date('tanggal_pengambilan_sp');
            $table->date('tanggal_input');
            $table->tinyInteger('status_pengambilan')->default(0);
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
        Schema::dropIfExists('pengambilan_sps');
    }
}
