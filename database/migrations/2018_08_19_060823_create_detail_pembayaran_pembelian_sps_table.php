<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPembayaranPembelianSpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembayaran_pembelian_sps', function (Blueprint $table) {
            $table->increments('id_detail_pembayaran_psp');
            $table->integer('id_pembelian_sp');
            $table->string('metode_pembayaran')->nullable();
            $table->string('cash')->default(0);
            $table->string('bca_pusat')->default(0);
            $table->string('bca_cabang')->default(0);
            $table->string('mandiri')->default(0);
            $table->string('bni')->default(0);
            $table->string('bri')->default(0);
            $table->string('nominal')->default(0);
            // $table->integer('id_rek1')->default(0);
            // $table->integer('id_rek2')->default(0);
            // $table->integer('id_rek3')->default(0);
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('detail_pembayaran_pembelian_sps');
    }
}
