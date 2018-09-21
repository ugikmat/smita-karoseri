<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPenjualanSpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan_sps', function (Blueprint $table) {
            $table->increments('id_detail_penjualan_sp');
            $table->string('id_penjualan_sp');
            $table->integer('id_customer');
            $table->integer('id_lokasi');
            $table->string('id_produk');
            $table->integer('jumlah_sp');
            $table->string('tipe_harga');
            $table->integer('harga_satuan');
            $table->integer('harga_beli')->nullable();
            $table->bigInteger('harga_total');
            $table->string('keterangan_detail_psp');
            $table->tinyInteger('status_detail_psp')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penjualan_sps');
    }
}
