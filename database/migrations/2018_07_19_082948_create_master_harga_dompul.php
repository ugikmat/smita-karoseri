<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterHargaDompul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('master_harga_dompuls', function (Blueprint $table) {
          $table->increments('id_harga_dompul');
          $table->string('nama_harga_dompul');
          $table->string('tipe_harga_dompul');
          $table->double('harga_dompul');
          $table->timestamp('tanggal_update');
          $table->string('status_harga_dompul');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_harga_dompuls');
    }
}
