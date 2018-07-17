<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('kategori_produk');
            $table->string('satuan');
            $table->string('jenis');
            $table->string('BOM');
            $table->double('harga_jual');
            $table->double('tarif_pajak');
            $table->integer('diskon');
            $table->integer('komisi');
            $table->string('status_produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
