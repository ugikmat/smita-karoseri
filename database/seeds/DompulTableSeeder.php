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
        $subdompul2->no_hp_master_dompul='081938063342';
        $subdompul2->no_hp_sub_master_dompul='081938063342';
        $subdompul2->id_gudang='3';
        $subdompul2->nama_sub_master_dompul='MD MADIUN';
        $subdompul2->tipe_dompul='MD';
        $subdompul2->status_sub_master_dompul='Aktif';
        $subdompul2->save();

        $subdompul3 = new Dompul();
        $subdompul3->no_hp_master_dompul='081938545995';
        $subdompul3->no_hp_sub_master_dompul='081938545987';
        $subdompul3->id_gudang='1';
        $subdompul3->nama_sub_master_dompul='SD SERVER';
        $subdompul3->tipe_dompul='SD';
        $subdompul3->status_sub_master_dompul='Aktif';
        $subdompul3->save();

        $subdompul4 = new Dompul();
        $subdompul4->no_hp_master_dompul='081938545995';
        $subdompul4->no_hp_sub_master_dompul='081938545988';
        $subdompul4->id_gudang='1';
        $subdompul4->nama_sub_master_dompul='BANGKALAN';
        $subdompul4->tipe_dompul='SD';
        $subdompul4->status_sub_master_dompul='Aktif';
        $subdompul4->save();

        $subdompul5 = new Dompul();
        $subdompul5->no_hp_master_dompul='081938545995';
        $subdompul5->no_hp_sub_master_dompul='081938545990';
        $subdompul5->id_gudang='1';
        $subdompul5->nama_sub_master_dompul='BANGKALAN DISTRO';
        $subdompul5->tipe_dompul='SD';
        $subdompul5->status_sub_master_dompul='Aktif';
        $subdompul5->save();

        $subdompul5 = new Dompul();
        $subdompul5->no_hp_master_dompul='081938545995';
        $subdompul5->no_hp_sub_master_dompul='081938545993';
        $subdompul5->id_gudang='1';
        $subdompul5->nama_sub_master_dompul='SAMPANG';
        $subdompul5->tipe_dompul='SD';
        $subdompul5->status_sub_master_dompul='Aktif';
        $subdompul5->save();

        $subdompul6 = new Dompul();
        $subdompul6->no_hp_master_dompul='081938545995';
        $subdompul6->no_hp_sub_master_dompul='081938545994';
        $subdompul6->id_gudang='1';
        $subdompul6->nama_sub_master_dompul='SAMPANG DISTRO';
        $subdompul6->tipe_dompul='SD';
        $subdompul6->status_sub_master_dompul='Aktif';
        $subdompul6->save();

        $subdompul7 = new Dompul();
        $subdompul7->no_hp_master_dompul='081938545995';
        $subdompul7->no_hp_sub_master_dompul='081938545995';
        $subdompul7->id_gudang='1';
        $subdompul7->nama_sub_master_dompul='MD MADURA';
        $subdompul7->tipe_dompul='MD';
        $subdompul7->status_sub_master_dompul='Aktif';
        $subdompul7->save();

        $subdompul8 = new Dompul();
        $subdompul8->no_hp_master_dompul='081938545995';
        $subdompul8->no_hp_sub_master_dompul='081938545995';
        $subdompul8->id_gudang='1';
        $subdompul8->nama_sub_master_dompul='MD MADURA';
        $subdompul8->tipe_dompul='MD';
        $subdompul8->status_sub_master_dompul='Aktif';
        $subdompul8->save();

        $subdompul9 = new Dompul();
        $subdompul9->no_hp_master_dompul='081938545995';
        $subdompul9->no_hp_sub_master_dompul='081938545996';
        $subdompul9->id_gudang='1';
        $subdompul9->nama_sub_master_dompul='PAMEKASAN';
        $subdompul9->tipe_dompul='SD';
        $subdompul9->status_sub_master_dompul='Aktif';
        $subdompul9->save();

        $subdompul10 = new Dompul();
        $subdompul10->no_hp_master_dompul='081938545995';
        $subdompul10->no_hp_sub_master_dompul='081938545997';
        $subdompul10->id_gudang='1';
        $subdompul10->nama_sub_master_dompul='PAMEKASAN DISTRO';
        $subdompul10->tipe_dompul='SD';
        $subdompul10->status_sub_master_dompul='Aktif';
        $subdompul10->save();

        $subdompul11 = new Dompul();
        $subdompul11->no_hp_master_dompul='081938545995';
        $subdompul11->no_hp_sub_master_dompul='081938545998';
        $subdompul11->id_gudang='1';
        $subdompul11->nama_sub_master_dompul='SUMENEP';
        $subdompul11->tipe_dompul='SD';
        $subdompul11->status_sub_master_dompul='Aktif';
        $subdompul11->save();

        $subdompul12 = new Dompul();
        $subdompul12->no_hp_master_dompul='081938545995';
        $subdompul12->no_hp_sub_master_dompul='081938546007';
        $subdompul12->id_gudang='1';
        $subdompul12->nama_sub_master_dompul='SUMENEP DISTRO';
        $subdompul12->tipe_dompul='SD';
        $subdompul12->status_sub_master_dompul='Aktif';
        $subdompul12->save();
    }
}
