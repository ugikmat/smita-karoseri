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
            $table->string('hp_kios');
            $table->integer('No_user');
            $table->date('tanggal_penjualan_dompul');
            $table->date('tanggal_input');
            $table->string('bank');
            $table->string('bank2');
            $table->string('bank3');
            $table->biginteger('grand_total');
            $table->biginteger('bayar_tunai');
            $table->biginteger('bayar_transfer');
            $table->biginteger('bayar_transfer2');
            $table->biginteger('bayar_transfer3');
            $table->text('catatan');
            $table->integer('status_pembayaran');
            $table->integer('status_penjualan');
            $table->integer('deleted');
            $table->timestamps();
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
