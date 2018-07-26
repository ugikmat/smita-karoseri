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
            $table->bigInteger('qty_program');
            $table->double('balance');
            $table->double('diskon');
            $table->string('no_hp_downline');
            $table->string('nama_downline');
            $table->string('status');
            $table->string('no_hp_canvasser');
            $table->string('nama_canvasser');
            $table->string('print')->nullable();
            $table->string('bayar');
            $table->timestamp('tanggal_input');
            $table->integer('no_user');
            $table->string('tipe_dompul');
            $table->tinyInteger('status_upload_dompul')->default(1);
            $table->tinyInteger('status_bayar_dompul')->default(0);
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
