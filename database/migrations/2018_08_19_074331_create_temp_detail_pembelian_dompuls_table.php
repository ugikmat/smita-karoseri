<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempDetailPembelianDompulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_detail_pembelian_dompuls', function (Blueprint $table) {
            $table->increments('id_temp_detail_pembelian_dompul');
            $table->string('id_pembelian_dompul');
            $table->integer('id_supplier');
            $table->integer('id_harga_dompul');
            $table->string('produk');
            $table->integer('jumlah');
            $table->string('tipe_harga');
            $table->integer('harga_satuan');
            $table->bigInteger('harga_total');
            $table->string('keterangan_detail_psp');
            $table->tinyInteger('status_detail_psp')->default(1);
            $table->temporary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_detail_pembelian_dompuls');
    }
}
