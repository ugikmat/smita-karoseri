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
            $table->string('bca_pusat')->nullable();
            $table->string('bca_cabang')->nullable();
            $table->string('mandiri')->nullable();
            $table->string('bni')->nullable();
            $table->string('bri')->nullable();
            $table->bigInteger('grand_total');
            $table->bigInteger('bayar_tunai')->default(0);
            $table->bigInteger('bayar_transfer')->nullable();
            $table->bigInteger('bayar_transfer2')->nullable();
            $table->bigInteger('bayar_transfer3')->nullable();
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
