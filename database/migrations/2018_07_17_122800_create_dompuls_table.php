<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDompulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dompuls', function (Blueprint $table) {
            $table->increments('id_dompul');
            $table->string('no_hp_master_dompul');
            $table->string('no_hp_sub_master_dompul');
            $table->string('id_gudang');
            $table->string('nama_sub_master_dompul');
            $table->string('tipe_dompul');
            $table->string('status_sub_master_dompul');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dompuls');
    }
}
