<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasbonTabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasbon_tabels', function (Blueprint $table) {
            $table->increments('id_kasbon');
            $table->string('id_spkpb')->nullable();
            $table->date('tgl_kasbon')->nullable();
            $table->string('nm_kasbon');
            $table->double('jumlah_kasbon');
            $table->double('sisa_borongan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasbon_tabels');
    }
}
