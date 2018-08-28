<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePbbTabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbb_tabels', function (Blueprint $table) {
            $table->increments('id_pbb');
            $table->string('id_spkpb')->default(' ');
            $table->string('id_wo')->nullable();
            $table->double('totalharga_material')->default(0);
            $table->timestamp('tgl_pbb')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('pemohon')->default(' ');
            $table->string('status')->default('PENDING');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbb_tabels');
    }
}
