<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSpkpbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spkpbs', function (Blueprint $table) {
          $table->increments('id_spkpb');
          $table->string('id_pb')->nullabel();
          $table->string('id_spkc')->nullable();
          $table->string('id_pbb')->nullable();
          $table->date('tgl_spkpb');
          $table->string('ukuran_karoseri');
          $table->double('harga_borongan');
          $table->text('keterangan_spkpb')->nullable();
          $table->string('status_spkpb')->default('PENDING');
          $table->string('status_print')->default('BELUM PRINT');
          $table->date('tanggal_print')->nullable();
          $table->tinyInteger('vote_spkpb')->default(1);
          $table->tinyInteger('vote_qc')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spkpbs');
    }
}
