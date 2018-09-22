<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempPenjualanSpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_penjualan_sps', function (Blueprint $table) {
            $table->increments('id_temp_penjualan_sp');
            $table->integer('id_lokasi');
            $table->integer('id_sales');
            // $table->integer('id_ho');
            // $table->integer('id_bo');
            $table->integer('id_customer');
            $table->string('no_hp_customer')->nullable();
            $table->string('id_user');
            $table->date('tanggal_penjualan_sp');
            $table->date('tanggal_input');
            $table->string('cash')->default(0);
            $table->string('bca_pusat')->default(0);
            $table->string('bca_cabang')->default(0);
            $table->string('mandiri')->default(0);
            $table->string('bni')->default(0);
            $table->string('bri')->default(0);
            $table->bigInteger('grand_total')->default(0);
            $table->bigInteger('bayar_tunai')->default(0);
            $table->bigInteger('bayar_transfer')->default(0);
            $table->bigInteger('bayar_transfer2')->default(0);
            $table->bigInteger('bayar_transfer3')->default(0);
            $table->integer('id_rek1')->default(0);
            $table->integer('id_rek2')->default(0);
            $table->integer('id_rek3')->default(0);
            $table->text('catatan')->nullable();
            $table->tinyInteger('status_pembayaran')->default(0);
            $table->tinyInteger('status_penjualan')->default(0);
            $table->tinyInteger('deleted')->default(0);
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
        Schema::dropIfExists('temp_penjualan_sps');
        // $dropTable = DB::unprepared( DB::raw("DROP TEMPORARY TABLE temp_penjualan_sps"));
    }
}
