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
            $table->string('id_penjualan_sp');
            $table->integer('id_customer');
            $table->string('id_produk');
            $table->integer('jumlah_sp');
            $table->string('tipe_harga');
            $table->integer('harga_satuan');
            $table->integer('harga_beli')->nullable();
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
        Schema::dropIfExists('temp_penjualan_sps');
        // $dropTable = DB::unprepared( DB::raw("DROP TEMPORARY TABLE temp_penjualan_sps"));
    }
}
