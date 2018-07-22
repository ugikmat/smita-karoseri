<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadDompulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_dompuls', function (Blueprint $table) {
            $table->increments('id_upload');
            $table->string('no_hp_sub_master_dompul');
            $table->string('nama_sub_master_dompul');
            $table->date('tanggal_transfer');
            $table->string('no_faktur');
            $table->string('produk');
            $table->bigInteger('qty');
            $table->string('balance');
            $table->double('diskon');
            $table->string('no_hp_downline');
            $table->string('nama_downline');
            $table->string('status');
            $table->string('no_hp_canvasser');
            $table->string('nama_canvasser');
            $table->string('inbox');
            $table->string('print')->nullable();
            $table->string('bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_dompuls');
    }
}
