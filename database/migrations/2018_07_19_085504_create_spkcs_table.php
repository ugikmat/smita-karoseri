<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpkcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spkcs', function (Blueprint $table) {
          $table->increments('id_spkc');
          $table->string('id_cust');
          $table->string('id_cb');
          $table->string('id_spv')->default(' ');
          $table->string('nm_perusahaan');
          $table->string('jenis_karoseri');
          $table->integer('jumlah_unit');
          $table->double('harga_unit');
          $table->double('ppn');
          $table->double('harga_total');
          $table->string('dokumen');
          $table->text('ket');
          $table->date('tanggal');
          $table->string('status')->default('PENDING');
          $table->string('statuswo')->default('PENDING');
          $table->tinyInteger('vote')->default(1);
      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spkcs');
    }
}
