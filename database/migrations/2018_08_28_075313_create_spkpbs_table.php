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

        //View SPKC
              DB::statement('CREATE VIEW view_spkc AS SELECT spkcs.*, master_customers.nm_cust, master_customers.jabatan, master_customers.alamat_cust, cara_bayars.keterangan
        FROM spkcs INNER JOIN master_customers ON spkcs.id_cust = master_customers.id_cust
        INNER JOIN cara_bayars ON spkcs.id_cb = cara_bayars.id');

        //View WO
              DB::statement('CREATE VIEW view_wo AS SELECT spkcs.*, master_customers.nm_cust, master_customers.jabatan, master_customers.alamat_cust, master_supervisors.nm_spv
        FROM spkcs INNER JOIN master_customers ON spkcs.id_cust = master_customers.id_cust
        INNER JOIN master_supervisors ON spkcs.id_spv = master_supervisors.id_spv');

        //View PBB
              DB::statement('CREATE VIEW view_pbb AS SELECT pbb_tabels.id_pbb, pbb_tabels.id_spkpb, pbb_tabels.totalharga_material, pbb_tabels.tgl_pbb, pbb_tabels.pemohon, pbb_tabels.status AS statuspbb, view_spkc.*
        FROM pbb_tabels INNER JOIN view_spkc ON pbb_tabels.id_wo = view_spkc.id_spkc');

        //View SPKPB
              DB::statement('CREATE VIEW view_spkpb AS SELECT spkpbs.id_spkpb, spkpbs.id_pb, spkpbs.id_pbb, spkpbs.tgl_spkpb, spkpbs.ukuran_karoseri, spkpbs.harga_borongan, spkpbs.keterangan_spkpb, spkpbs.status_spkpb, spkpbs.vote_spkpb, spkpbs.vote_qc, spkcs.*, master_pemborongs.nm_pb, master_pemborongs.jenis_pb, kasbon_tabels.sisa_borongan
        FROM spkpbs
        INNER JOIN spkcs ON spkcs.id_spkc = spkpbs.id_spkc
        INNER JOIN master_pemborongs ON master_pemborongs.id_pb = spkpbs.id_pb
        LEFT JOIN kasbon_tabels ON spkpbs.id_spkpb = kasbon_tabels.id_spkpb');

        //View Kasbon
              DB::statement('CREATE VIEW view_kasbon AS SELECT spkpbs.id_spkpb, spkpbs.id_pb, spkpbs.id_pbb, spkpbs.tgl_spkpb, spkpbs.ukuran_karoseri, spkpbs.harga_borongan, spkpbs.keterangan_spkpb, spkpbs.status_spkpb, spkpbs.vote_spkpb, spkcs.*, master_pemborongs.nm_pb, master_pemborongs.jenis_pb, kasbon_tabels.id_kasbon, kasbon_tabels.tgl_kasbon, kasbon_tabels.nm_kasbon, kasbon_tabels.jumlah_kasbon, kasbon_tabels.sisa_borongan
        FROM spkpbs
        INNER JOIN spkcs ON spkcs.id_spkc = spkpbs.id_spkc
        INNER JOIN master_pemborongs ON master_pemborongs.id_pb = spkpbs.id_pb
        INNER JOIN kasbon_tabels ON kasbon_tabels.id_spkpb = spkpbs.id_spkpb');

        //View BAP
              DB::statement('CREATE VIEW view_bap AS SELECT spkpbs.id_spkpb, spkpbs.id_pb, spkpbs.id_pbb, spkpbs.tgl_spkpb, spkpbs.ukuran_karoseri, spkpbs.harga_borongan, spkpbs.keterangan_spkpb, spkpbs.status_spkpb, spkpbs.status_print, spkpbs.tanggal_print, spkpbs.vote_spkpb, spkcs.*, master_pemborongs.nm_pb, master_pemborongs.jenis_pb
        FROM spkpbs
        INNER JOIN spkcs ON spkcs.id_spkc = spkpbs.id_spkc
        INNER JOIN master_pemborongs ON master_pemborongs.id_pb = spkpbs.id_pb');

        //View SJ
              DB::statement('CREATE VIEW view_sj AS SELECT spkcs.*, master_customers.nm_cust, produksi_tabels.id_produksi, produksi_tabels.kode_produksi, produksi_tabels.tgl_mulai, produksi_tabels.tgl_akhir, produksi_tabels.status_produksi, produksi_tabels.status_print_sj
        FROM spkcs
        INNER JOIN produksi_tabels ON spkcs.id_spkc = produksi_tabels.id_spkc
        LEFT JOIN master_customers ON spkcs.id_cust = master_customers.id_cust');

        //View Produksi
              DB::statement('CREATE VIEW view_produksi AS SELECT spkcs.*, produksi_tabels.id_produksi, produksi_tabels.kode_produksi, produksi_tabels.tgl_akhir, produksi_tabels.status_produksi
        FROM spkcs
        INNER JOIN produksi_tabels ON spkcs.id_spkc = produksi_tabels.id_spkc');

        //View Progress
              DB::statement('CREATE VIEW view_progress_unit AS SELECT view_spkpb.*, master_supervisors.nm_spv, master_customers.nm_cust, qcpb_tabels.id_qcpb, qcpb_tabels.tgl_pengerjaan, qcpb_tabels.tgl_progress, qcpb_tabels.tgl_selesai, qcpb_tabels.jenis_pekerjaan, qcpb_tabels.keterangan, qcpb_tabels.persentase
        FROM view_spkpb
        INNER JOIN qcpb_tabels ON qcpb_tabels.id_spkpb = view_spkpb.id_spkpb
        INNER JOIN master_customers ON master_customers.id_cust = view_spkpb.id_cust
        INNER JOIN master_supervisors ON master_supervisors.id_spv = view_spkpb.id_spv');
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
