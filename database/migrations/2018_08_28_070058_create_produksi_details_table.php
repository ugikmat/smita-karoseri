<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksi_details', function (Blueprint $table) {
            $table->increments('id_detailproduksi');
            $table->string('id_produksi');
            $table->string('kegiatan');
            $table->dateTime('tgl_jam');
            $table->longText('foto_pengerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produksi_details');
    }
}
