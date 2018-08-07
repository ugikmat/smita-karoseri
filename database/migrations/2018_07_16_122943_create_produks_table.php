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
        Schema::create('master_produks', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('kategori_produk');
            $table->string('satuan');
            $table->string('jenis');
            $table->string('BOM');
            $table->double('harga_jual');
            $table->double('tarif_pajak');
            $table->double('diskon');
            $table->double('komisi');
            $table->tinyInteger('status_produk')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_produks');
    }
}
