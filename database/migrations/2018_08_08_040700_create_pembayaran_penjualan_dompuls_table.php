<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranPenjualanDompulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_penjualan_dompuls', function (Blueprint $table) {
            $table->increments('id_pembayaran_penjualan_dompul');
            $table->string('id_penjualan_dompul');
            $table->string('id_user');
            $table->date('tanggal_pembayaran_penjualan');
            $table->date('tanggal_input');
            $table->bigInteger('nominal');
            $table->tinyInteger('status_pembayaran_penjualan')->default(0);
            $table->tinyInteger('status_cetak')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_penjualan_dompuls');
    }
}
