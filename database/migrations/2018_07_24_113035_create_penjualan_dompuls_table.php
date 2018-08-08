<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanDompulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_dompuls', function (Blueprint $table) {
            $table->increments('id_penjualan_dompul');
            $table->integer('id_sales');
            // $table->integer('id_ho');
            // $table->integer('id_bo');
            $table->string('no_hp_kios');
            $table->string('no_user');
            $table->date('tanggal_penjualan_dompul');
            $table->date('tanggal_input');
            $table->string('cash')->default(0);
            $table->string('bca_pusat')->default(0);
            $table->string('bca_cabang')->default(0);
            $table->string('mandiri')->default(0);
            $table->string('bni')->default(0);
            $table->string('bri')->default(0);
            $table->bigInteger('grand_total');
            $table->bigInteger('bayar_tunai')->default(0);
            $table->bigInteger('bayar_transfer')->default(0);
            $table->bigInteger('bayar_transfer2')->default(0);
            $table->bigInteger('bayar_transfer3')->default(0);
            $table->text('catatan');
            $table->tinyInteger('status_pembayaran')->default(0);
            $table->tinyInteger('status_penjualan')->default(0);
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
        Schema::dropIfExists('penjualan_dompuls');
    }
}
