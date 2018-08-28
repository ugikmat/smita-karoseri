<?php

use Illuminate\Database\Seeder;
use App\Dompul;

class DompulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subdompul1 = new Dompul();
        $subdompul1->no_hp_master_dompul='081938063309';
        $subdompul1->no_hp_sub_master_dompul='081938062640';
        $subdompul1->id_gudang='2';
        $subdompul1->nama_sub_master_dompul='SD ROS SDJ';
        $subdompul1->tipe_dompul='SD';
        $subdompul1->status_sub_master_dompul='Aktif';
        $subdompul1->save();

        $subdompul2 = new Dompul();
        $subdompul2->no_hp_master_dompul='081938063309';
        $subdompul2->no_hp_sub_master_dompul='081938062641';
        $subdompul2->id_gudang='2';
        $subdompul2->nama_sub_master_dompul='SD SIDOARJO';
        $subdompul2->tipe_dompul='SD';
        $subdompul2->status_sub_master_dompul='Aktif';
        $subdompul2->save();

        $subdompul3 = new Dompul();
        $subdompul3->no_hp_master_dompul='081938063309';
        $subdompul3->no_hp_sub_master_dompul='081938062642';
        $subdompul3->id_gudang='2';
        $subdompul3->nama_sub_master_dompul='SD MJK-JMB';
        $subdompul3->tipe_dompul='SD';
        $subdompul3->status_sub_master_dompul='Aktif';
        $subdompul3->save();

        $subdompul4 = new Dompul();
        $subdompul4->no_hp_master_dompul='081938063309';
        $subdompul4->no_hp_sub_master_dompul='081938062644';
        $subdompul4->id_gudang='2';
        $subdompul4->nama_sub_master_dompul='SD TUBAN';
        $subdompul4->tipe_dompul='SD';
        $subdompul4->status_sub_master_dompul='Aktif';
        $subdompul4->save();

        $subdompul5 = new Dompul();
        $subdompul5->no_hp_master_dompul='081938063309';
        $subdompul5->no_hp_sub_master_dompul='081938063309';
        $subdompul5->id_gudang='2';
        $subdompul5->nama_sub_master_dompul='MD SIDOARJO';
        $subdompul5->tipe_dompul='MD';
        $subdompul5->status_sub_master_dompul='Aktif';
        $subdompul5->save();

        $subdompul6 = new Dompul();
        $subdompul6->no_hp_master_dompul='081938063342';
        $subdompul6->no_hp_sub_master_dompul='081938063342';
        $subdompul6->id_gudang='3';
        $subdompul6->nama_sub_master_dompul='MD MADIUN';
        $subdompul6->tipe_dompul='MD';
        $subdompul6->status_sub_master_dompul='Aktif';
        $subdompul6->save();

        $subdompul7 = new Dompul();
        $subdompul7->no_hp_master_dompul='081938063342';
        $subdompul7->no_hp_sub_master_dompul='081938063356';
        $subdompul7->id_gudang='3';
        $subdompul7->nama_sub_master_dompul='SD TUL-BLI-TRE';
        $subdompul7->tipe_dompul='SD';
        $subdompul7->status_sub_master_dompul='Aktif';
        $subdompul7->save();

        $subdompul8 = new Dompul();
        $subdompul8->no_hp_master_dompul='081938063342';
        $subdompul8->no_hp_sub_master_dompul='081938063358';
        $subdompul8->id_gudang='3';
        $subdompul8->nama_sub_master_dompul='SD KDR-NGK';
        $subdompul8->tipe_dompul='SD';
        $subdompul8->status_sub_master_dompul='Aktif';
        $subdompul8->save();

        $subdompul9 = new Dompul();
        $subdompul9->no_hp_master_dompul='081938063342';
        $subdompul9->no_hp_sub_master_dompul='081938063363';
        $subdompul9->id_gudang='3';
        $subdompul9->nama_sub_master_dompul='SD GRT-MDN-SRV';
        $subdompul9->tipe_dompul='SD';
        $subdompul9->status_sub_master_dompul='Aktif';
        $subdompul9->save();

        $subdompul10 = new Dompul();
        $subdompul10->no_hp_master_dompul='081938063342';
        $subdompul10->no_hp_sub_master_dompul='081938063370';
        $subdompul10->id_gudang='3';
        $subdompul10->nama_sub_master_dompul='SD MDN-MAG-NGA';
        $subdompul10->tipe_dompul='SD';
        $subdompul10->status_sub_master_dompul='Aktif';
        $subdompul10->save();

        $subdompul11 = new Dompul();
        $subdompul11->no_hp_master_dompul='081938063342';
        $subdompul11->no_hp_sub_master_dompul='081938063371';
        $subdompul11->id_gudang='3';
        $subdompul11->nama_sub_master_dompul='SD PCT-PNR';
        $subdompul11->tipe_dompul='SD';
        $subdompul11->status_sub_master_dompul='Aktif';
        $subdompul11->save();

        $subdompul12 = new Dompul();
        $subdompul12->no_hp_master_dompul='081938545995';
        $subdompul12->no_hp_sub_master_dompul='081938545987';
        $subdompul12->id_gudang='1';
        $subdompul12->nama_sub_master_dompul='SD SERVER';
        $subdompul12->tipe_dompul='SD';
        $subdompul12->status_sub_master_dompul='Aktif';
        $subdompul12->save();

        $subdompul13 = new Dompul();
        $subdompul13->no_hp_master_dompul='081938545995';
        $subdompul13->no_hp_sub_master_dompul='081938545988';
        $subdompul13->id_gudang='1';
        $subdompul13->nama_sub_master_dompul='BANGKALAN';
        $subdompul13->tipe_dompul='SD';
        $subdompul13->status_sub_master_dompul='Aktif';
        $subdompul13->save();

        $subdompul14 = new Dompul();
        $subdompul14->no_hp_master_dompul='081938545995';
        $subdompul14->no_hp_sub_master_dompul='081938545990';
        $subdompul14->id_gudang='1';
        $subdompul14->nama_sub_master_dompul='BANGKALAN DISTRO';
        $subdompul14->tipe_dompul='SD';
        $subdompul14->status_sub_master_dompul='Aktif';
        $subdompul14->save();

        $subdompul15 = new Dompul();
        $subdompul15->no_hp_master_dompul='081938545995';
        $subdompul15->no_hp_sub_master_dompul='081938545993';
        $subdompul15->id_gudang='1';
        $subdompul15->nama_sub_master_dompul='SAMPANG';
        $subdompul15->tipe_dompul='SD';
        $subdompul15->status_sub_master_dompul='Aktif';
        $subdompul15->save();

        $subdompul16 = new Dompul();
        $subdompul16->no_hp_master_dompul='081938545995';
        $subdompul16->no_hp_sub_master_dompul='081938545994';
        $subdompul16->id_gudang='1';
        $subdompul16->nama_sub_master_dompul='SAMPANG DISTRO';
        $subdompul16->tipe_dompul='SD';
        $subdompul16->status_sub_master_dompul='Aktif';
        $subdompul16->save();

        $subdompul17 = new Dompul();
        $subdompul17->no_hp_master_dompul='081938545995';
        $subdompul17->no_hp_sub_master_dompul='081938545995';
        $subdompul17->id_gudang='1';
        $subdompul17->nama_sub_master_dompul='MD MADURA';
        $subdompul17->tipe_dompul='MD';
        $subdompul17->status_sub_master_dompul='Aktif';
        $subdompul17->save();

        $subdompul18 = new Dompul();
        $subdompul18->no_hp_master_dompul='081938545995';
        $subdompul18->no_hp_sub_master_dompul='081938545996';
        $subdompul18->id_gudang='1';
        $subdompul18->nama_sub_master_dompul='PAMEKASAN';
        $subdompul18->tipe_dompul='SD';
        $subdompul18->status_sub_master_dompul='Aktif';
        $subdompul18->save();

        $subdompul19 = new Dompul();
        $subdompul19->no_hp_master_dompul='081938545995';
        $subdompul19->no_hp_sub_master_dompul='081938545997';
        $subdompul19->id_gudang='1';
        $subdompul19->nama_sub_master_dompul='PAMEKASAN DISTRO';
        $subdompul19->tipe_dompul='SD';
        $subdompul19->status_sub_master_dompul='Aktif';
        $subdompul19->save();

        $subdompul20 = new Dompul();
        $subdompul20->no_hp_master_dompul='081938545995';
        $subdompul20->no_hp_sub_master_dompul='081938545998';
        $subdompul20->id_gudang='1';
        $subdompul20->nama_sub_master_dompul='SUMENEP';
        $subdompul20->tipe_dompul='SD';
        $subdompul20->status_sub_master_dompul='Aktif';
        $subdompul20->save();

        $subdompul21 = new Dompul();
        $subdompul21->no_hp_master_dompul='081938545995';
        $subdompul21->no_hp_sub_master_dompul='081938546007';
        $subdompul21->id_gudang='1';
        $subdompul21->nama_sub_master_dompul='SUMENEP DISTRO';
        $subdompul21->tipe_dompul='SD';
        $subdompul21->status_sub_master_dompul='Aktif';
        $subdompul21->save();
    }
}
