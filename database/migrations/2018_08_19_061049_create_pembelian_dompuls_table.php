<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelianDompulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_dompuls', function (Blueprint $table) {
            $table->increments('id_pembelian_dompul');
            $table->integer('id_supplier');
            // $table->integer('id_ho');
            // $table->integer('id_bo');
            $table->integer('id_lokasi');
            $table->string('id_user');
            $table->date('tanggal_pembelian_dompul');
            $table->date('tanggal_input');
            $table->double('grand_total');
            $table->tinyInteger('status_pembayaran')->default(0);
            $table->tinyInteger('status_pembelian')->default(0);
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
        Schema::dropIfExists('pembelian_dompuls');
    }
}
