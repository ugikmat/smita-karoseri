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
            $table->string('id_penjualan_dompul');
            $table->integer('id_sales');
            $table->integer('id_ho');
            $table->integer('id_bo');
            $table->string('no_hp_kios');
            $table->string('no_user');
            $table->timestamp('tanggal_penjualan_dompul');
            $table->timestamp('tanggal_input');
            $table->string('bank');
            $table->string('bank2');
            $table->string('bank3');
            $table->bigInteger('grand_total');
            $table->bigInteger('bayar_tunai');
            $table->bigInteger('bayar_transfer');
            $table->bigInteger('bayar_transfer2');
            $table->bigInteger('bayar_transfer3');
            $table->string('catatan');
            $table->tinyInteger('status_pembayaran')->default(1);
            $table->tinyInteger('status_penjualan')->default(1);
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
