<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateSuratJalanTabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_jalan_tabels', function (Blueprint $table) {
            $table->increments('id_sj');
            $table->string('id_produksi');
            $table->string('id_spkc');
            $table->date('tanggal_kirim');
            $table->string('nm_sopir');
            $table->text('catatan')->nullable();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_jalan_tabels');
    }
}
