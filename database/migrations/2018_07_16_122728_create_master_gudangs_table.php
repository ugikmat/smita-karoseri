<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Database\Migrations\CreateMasterLokasisTable;

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
            $table->increments('id_gudang');
            $table->string('id_lokasi');
            $table->string('alamat_gudang');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
        // if (Schema::hasTable('master_lokasis')) {
        //     if (Schema::hasColumn('master_lokasis', 'id_lokasi')) {
        //         Schema::table('master_gudangs', function (Blueprint $table) {
        //             $table->foreign('id_lokasi')->references('id_lokasi')->on('master_lokasis')->onUpdate('cascade')->onDelete('cascade');
        //         });
        //     }
        // }
        // DB::statement( 'CREATE VIEW view_gudang AS
        // SELECT id_gudang, master_lokasis.nm_lokasi, alamat_gudang, master_gudangs.status
        // FROM master_gudangs INNER join master_lokasis on master_gudangs.id_lokasi = master_lokasis.id_lokasi' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_gudangs');

        DB::statement( 'DROP VIEW view_gudang' );
    }
}
