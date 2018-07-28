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
            $table->integer('id_penjualan_dompul');
            $table->string('no_hp_sub_master_dompul');
            $table->string('nama_sub_master_dompul');
            $table->date('tanggal_transfer');
            $table->date('tanggal_upload');
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
            $table->string('inbox');
            $table->string('print')->nullable();
            $table->string('bayar');
            $table->string('tipe_dompul')->default('CVS');
            $table->double('harga_Dompul')->default(0);
            // $table->integer('no_user');
            $table->tinyInteger('status_active')->default(0);
            $table->tinyInteger('status_penjualan')->default(0);
            $table->tinyInteger('deleted')->default(0);
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
