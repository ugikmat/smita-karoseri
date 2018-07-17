<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id_supplier');
            $table->string('nama_supplier');
            $table->string('alamat_supplier');
            $table->string('telepon_supplier');
            $table->string('email_supplier');
            $table->string('bank_supplier');
            $table->string('norek_supplier');
            $table->string('status_supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
