<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePbbDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbb_details', function (Blueprint $table) {
            $table->increments('id_detailpbb');
            $table->string('id_pbb')->nullable();
            $table->string('id_wo')->default(' ');
            $table->string('material');
            $table->string('ukuran');
            $table->integer('jumlah');
            $table->integer('jumlah_setuju')->default(0);
            $table->string('catatan');
            $table->string('pemohon')->default(' ');
            $table->tinyInteger('votes')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbb_details');
    }
}
