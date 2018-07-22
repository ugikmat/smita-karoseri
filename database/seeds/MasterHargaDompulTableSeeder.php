<?php

use Illuminate\Database\Seeder;

class MasterHargaDompulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $hargadompul = new MasterHargaDompul();
      $hargadompul->nama_harga_dompul='DP5';
      $hargadompul->tipe_harga_dompul='DS';
      $hargadompul->harga_dompul=6000;
      $hargadompul->status_harga_dompul='Aktif';
      $hargadompul->save();

      $hargadompul2 = new MasterHargaDompul();
      $hargadompul2->nama_harga_dompul='DP10';
      $hargadompul2->tipe_harga_dompul='DS';
      $hargadompul2->harga_dompul=11000;
      $hargadompul2->status_harga_dompul='Aktif';
      $hargadompul2->save();

      $hargadompul3 = new MasterHargaDompul();
      $hargadompul3->nama_harga_dompul='DP5';
      $hargadompul3->tipe_harga_dompul='CVS';
      $hargadompul3->harga_dompul=5650;
      $hargadompul3->status_harga_dompul='Aktif';
      $hargadompul3->save();

      $hargadompul4 = new MasterHargaDompul();
      $hargadompul4->nama_harga_dompul='DP10';
      $hargadompul4->tipe_harga_dompul='CVS';
      $hargadompul4->harga_dompul=10650;
      $hargadompul4->status_harga_dompul='Aktif';
      $hargadompul4->save();

      $hargadompul5 = new MasterHargaDompul();
      $hargadompul5->nama_harga_dompul='DP5';
      $hargadompul5->tipe_harga_dompul='HI';
      $hargadompul5->harga_dompul=5000;
      $hargadompul5->status_harga_dompul='Aktif';
      $hargadompul5->save();

      $hargadompul6 = new MasterHargaDompul();
      $hargadompul6->nama_harga_dompul='DP10';
      $hargadompul6->tipe_harga_dompul='HI';
      $hargadompul6->harga_dompul=10000;
      $hargadompul6->status_harga_dompul='Aktif';
      $hargadompul6->save();

      $hargadompul7 = new MasterHargaDompul();
      $hargadompul7->nama_harga_dompul='DP5';
      $hargadompul7->tipe_harga_dompul='SERVER';
      $hargadompul7->harga_dompul=5550;
      $hargadompul7->status_harga_dompul='Aktif';
      $hargadompul7->save();

      $hargadompul8 = new MasterHargaDompul();
      $hargadompul8->nama_harga_dompul='DP10';
      $hargadompul8->tipe_harga_dompul='SERVER';
      $hargadompul8->harga_dompul=10550;
      $hargadompul8->status_harga_dompul='Aktif';
      $hargadompul8->save();

      $hargadompul9 = new MasterHargaDompul();
      $hargadompul9->nama_harga_dompul='DP5';
      $hargadompul9->tipe_harga_dompul='Sidebar';
      $hargadompul9->harga_dompul=5500;
      $hargadompul9->status_harga_dompul='Aktif';
      $hargadompul9->save();

      $hargadompul10 = new MasterHargaDompul();
      $hargadompul10->nama_harga_dompul='DP10';
      $hargadompul10->tipe_harga_dompul='SDE';
      $hargadompul10->harga_dompul=10500;
      $hargadompul10->status_harga_dompul='Aktif';
      $hargadompul10->save();

      $hargadompul11 = new MasterHargaDompul();
      $hargadompul11->nama_harga_dompul='DOMPUL';
      $hargadompul11->tipe_harga_dompul='DS';
      $hargadompul11->harga_dompul=1;
      $hargadompul11->status_harga_dompul='Aktif';
      $hargadompul11->save();

      $hargadompul12 = new MasterHargaDompul();
      $hargadompul12->nama_harga_dompul='DOMPUL';
      $hargadompul12->tipe_harga_dompul='CVS';
      $hargadompul12->harga_dompul=0.985;
      $hargadompul12->status_harga_dompul='Aktif';
      $hargadompul12->save();

      $hargadompul13 = new MasterHargaDompul();
      $hargadompul13->nama_harga_dompul='DOMPUL';
      $hargadompul13->tipe_harga_dompul='HI';
      $hargadompul13->harga_dompul=0.98;
      $hargadompul13->status_harga_dompul='Aktif';
      $hargadompul13->save();

      $hargadompul14 = new MasterHargaDompul();
      $hargadompul14->nama_harga_dompul='DOMPUL';
      $hargadompul14->tipe_harga_dompul='SERVER';
      $hargadompul14->harga_dompul=0.985;
      $hargadompul14->status_harga_dompul='Aktif';
      $hargadompul14->save();

      $hargadompul15 = new MasterHargaDompul();
      $hargadompul15->nama_harga_dompul='DOMPUL';
      $hargadompul15->tipe_harga_dompul='SDE';
      $hargadompul15->harga_dompul=0.98;
      $hargadompul15->status_harga_dompul='Aktif';
      $hargadompul15->save();

      $hargadompul16 = new MasterHargaDompul();
      $hargadompul16->nama_harga_dompul='DP5';
      $hargadompul16->tipe_harga_dompul='CVS2';
      $hargadompul16->harga_dompul=5350;
      $hargadompul16->status_harga_dompul='Aktif';
      $hargadompul16->save();

      $hargadompul17 = new MasterHargaDompul();
      $hargadompul17->nama_harga_dompul='DP10';
      $hargadompul17->tipe_harga_dompul='CVS2';
      $hargadompul17->harga_dompul=10350;
      $hargadompul17->status_harga_dompul='Aktif';
      $hargadompul17->save();

      $hargadompul18 = new MasterHargaDompul();
      $hargadompul18->nama_harga_dompul='DP5';
      $hargadompul18->tipe_harga_dompul='CVS1';
      $hargadompul18->harga_dompul=5500;
      $hargadompul18->status_harga_dompul='Aktif';
      $hargadompul18->save();

      $hargadompul19 = new MasterHargaDompul();
      $hargadompul19->nama_harga_dompul='DP10';
      $hargadompul19->tipe_harga_dompul='CVS1';
      $hargadompul19->harga_dompul=10500;
      $hargadompul19->status_harga_dompul='Aktif';
      $hargadompul19->save();

      $hargadompul20 = new MasterHargaDompul();
      $hargadompul20->nama_harga_dompul='DP5';
      $hargadompul20->tipe_harga_dompul='CVS3';
      $hargadompul20->harga_dompul=5450;
      $hargadompul20->status_harga_dompul='Aktif';
      $hargadompul20->save();
    }
}
