<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterHargaSp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('master_harga_sps', function (Blueprint $table) {
          $table->increments('id_harga_sp');
          $table->string('id_produk');
          $table->string('tipe_harga_sp');
          $table->bigInteger('harga_sp');
          $table->string('status_harga_sp');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_harga_sps');
    }
}
