<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQcpbTabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcpb_tabels', function (Blueprint $table) {
            $table->increments('id_qcpb');
            $table->date('tgl_pengerjaan');
            $table->dateTime('tgl_progress')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->text('jenis_pekerjaan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('persentase')->default('0%');
            $table->string('id_spkpb')->nullable();
            $table->string('nm_pb')->nullable();
            $table->string('jenis_pb')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qcpb_tabels');
    }
}
