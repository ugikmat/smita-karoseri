<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartuStokDompulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_stok_dompuls', function (Blueprint $table) {
            $table->increments('id_stok_dompul');
            $table->string('id_produk');
            $table->integer('id_sales')->nullable();
            $table->integer('id_lokasi');
            $table->dateTime('tanggal_transaksi');
            $table->string('nomor_referensi', 30);
            $table->string('jenis_transaksi', 30);
            $table->text('keterangan');
            $table->bigInteger('masuk');
            $table->bigInteger('keluar');
            $table->dateTime('tanggal_input');
            $table->integer('id_user');
            $table->tinyInteger('status_stok_dompul')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kartu_stok_dompuls');
    }
}
