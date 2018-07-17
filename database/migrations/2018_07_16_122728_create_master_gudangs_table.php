<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_gudangs', function (Blueprint $table) {
            $table->string('id_gudang')->primary();
            $table->string('id_lokasi');
            $table->string('alamat_gudang');
            $table->timestamps();
        });

        Schema::table('master_gudangs', function (Blueprint $table) {
            $table->foreign('id_lokasi')->references('id_lokasi')->on('master_lokasis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_gudangs');
    }
}
