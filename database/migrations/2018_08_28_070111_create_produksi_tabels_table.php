<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksiTabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksi_tabels', function (Blueprint $table) {
            $table->increments('id_produksi');
            $table->string('kode_produksi');
            $table->string('id_spkc');
            $table->date('tgl_mulai')->nullable();
            $table->dateTime('tgl_akhir')->nullable();
            $table->string('status_produksi')->default('BELUM SELESAI');
            $table->string('status_print_sj')->default('BELUM PRINT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produksi_tabels');
    }
}
