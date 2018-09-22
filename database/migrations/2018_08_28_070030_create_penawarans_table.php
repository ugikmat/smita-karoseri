<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawarans', function (Blueprint $table) {
            $table->integer('id_spkc');
            $table->string('id_penawaran')->unique();
            $table->date('tgl_penawaran');
            $table->string('karoseri_penawaran');
            $table->integer('jml_unit_penawaran');
            $table->double('harga_unit_penawaran');
            $table->double('ppb_penawaran');
            $table->double('total_harga_penawaran');
            $table->longText('spek_penawaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penawarans');
    }
}
