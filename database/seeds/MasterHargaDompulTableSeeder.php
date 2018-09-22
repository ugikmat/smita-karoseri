<?php

use Illuminate\Database\Seeder;
use App\HargaDompul;

class MasterHargaDompulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $hargadompul = new HargaDompul();
      $hargadompul->nama_harga_dompul='DP5';
      $hargadompul->tipe_harga_dompul='DS';
      $hargadompul->harga_dompul=6000;
      $hargadompul->status_harga_dompul='Aktif';
      $hargadompul->save();

      $hargadompul2 = new HargaDompul();
      $hargadompul2->nama_harga_dompul='DP10';
      $hargadompul2->tipe_harga_dompul='DS';
      $hargadompul2->harga_dompul=11000;
      $hargadompul2->status_harga_dompul='Aktif';
      $hargadompul2->save();

      $hargadompul3 = new HargaDompul();
      $hargadompul3->nama_harga_dompul='DP5';
      $hargadompul3->tipe_harga_dompul='CVS';
      $hargadompul3->harga_dompul=5650;
      $hargadompul3->status_harga_dompul='Aktif';
      $hargadompul3->save();

      $hargadompul4 = new HargaDompul();
      $hargadompul4->nama_harga_dompul='DP10';
      $hargadompul4->tipe_harga_dompul='CVS';
      $hargadompul4->harga_dompul=10650;
      $hargadompul4->status_harga_dompul='Aktif';
      $hargadompul4->save();

      $hargadompul5 = new HargaDompul();
      $hargadompul5->nama_harga_dompul='DP5';
      $hargadompul5->tipe_harga_dompul='HI';
      $hargadompul5->harga_dompul=5000;
      $hargadompul5->status_harga_dompul='Aktif';
      $hargadompul5->save();

      $hargadompul6 = new HargaDompul();
      $hargadompul6->nama_harga_dompul='DP10';
      $hargadompul6->tipe_harga_dompul='HI';
      $hargadompul6->harga_dompul=10000;
      $hargadompul6->status_harga_dompul='Aktif';
      $hargadompul6->save();

      $hargadompul7 = new HargaDompul();
      $hargadompul7->nama_harga_dompul='DP5';
      $hargadompul7->tipe_harga_dompul='SERVER';
      $hargadompul7->harga_dompul=5550;
      $hargadompul7->status_harga_dompul='Aktif';
      $hargadompul7->save();

      $hargadompul8 = new HargaDompul();
      $hargadompul8->nama_harga_dompul='DP10';
      $hargadompul8->tipe_harga_dompul='SERVER';
      $hargadompul8->harga_dompul=10550;
      $hargadompul8->status_harga_dompul='Aktif';
      $hargadompul8->save();

      $hargadompul9 = new HargaDompul();
      $hargadompul9->nama_harga_dompul='DP5';
      $hargadompul9->tipe_harga_dompul='SDE';
      $hargadompul9->harga_dompul=5500;
      $hargadompul9->status_harga_dompul='Aktif';
      $hargadompul9->save();

      $hargadompul10 = new HargaDompul();
      $hargadompul10->nama_harga_dompul='DP10';
      $hargadompul10->tipe_harga_dompul='SDE';
      $hargadompul10->harga_dompul=10500;
      $hargadompul10->status_harga_dompul='Aktif';
      $hargadompul10->save();

      $hargadompul11 = new HargaDompul();
      $hargadompul11->nama_harga_dompul='DOMPUL';
      $hargadompul11->tipe_harga_dompul='DS';
      $hargadompul11->harga_dompul=1;
      $hargadompul11->status_harga_dompul='Aktif';
      $hargadompul11->save();

      $hargadompul12 = new HargaDompul();
      $hargadompul12->nama_harga_dompul='DOMPUL';
      $hargadompul12->tipe_harga_dompul='CVS';
      $hargadompul12->harga_dompul=0.985;
      $hargadompul12->status_harga_dompul='Aktif';
      $hargadompul12->save();

      $hargadompul13 = new HargaDompul();
      $hargadompul13->nama_harga_dompul='DOMPUL';
      $hargadompul13->tipe_harga_dompul='HI';
      $hargadompul13->harga_dompul=0.98;
      $hargadompul13->status_harga_dompul='Aktif';
      $hargadompul13->save();

      $hargadompul14 = new HargaDompul();
      $hargadompul14->nama_harga_dompul='DOMPUL';
      $hargadompul14->tipe_harga_dompul='SERVER';
      $hargadompul14->harga_dompul=0.985;
      $hargadompul14->status_harga_dompul='Aktif';
      $hargadompul14->save();

      $hargadompul15 = new HargaDompul();
      $hargadompul15->nama_harga_dompul='DOMPUL';
      $hargadompul15->tipe_harga_dompul='SDE';
      $hargadompul15->harga_dompul=0.98;
      $hargadompul15->status_harga_dompul='Aktif';
      $hargadompul15->save();

      $hargadompul16 = new HargaDompul();
      $hargadompul16->nama_harga_dompul='DP5';
      $hargadompul16->tipe_harga_dompul='CVS2';
      $hargadompul16->harga_dompul=5350;
      $hargadompul16->status_harga_dompul='Aktif';
      $hargadompul16->save();

      $hargadompul17 = new HargaDompul();
      $hargadompul17->nama_harga_dompul='DP10';
      $hargadompul17->tipe_harga_dompul='CVS2';
      $hargadompul17->harga_dompul=10350;
      $hargadompul17->status_harga_dompul='Aktif';
      $hargadompul17->save();

      $hargadompul18 = new HargaDompul();
      $hargadompul18->nama_harga_dompul='DP5';
      $hargadompul18->tipe_harga_dompul='CVS1';
      $hargadompul18->harga_dompul=5500;
      $hargadompul18->status_harga_dompul='Aktif';
      $hargadompul18->save();

      $hargadompul19 = new HargaDompul();
      $hargadompul19->nama_harga_dompul='DP10';
      $hargadompul19->tipe_harga_dompul='CVS1';
      $hargadompul19->harga_dompul=10500;
      $hargadompul19->status_harga_dompul='Aktif';
      $hargadompul19->save();

      $hargadompul20 = new HargaDompul();
      $hargadompul20->nama_harga_dompul='DP5';
      $hargadompul20->tipe_harga_dompul='CVS3';
      $hargadompul20->harga_dompul=5450;
      $hargadompul20->status_harga_dompul='Aktif';
      $hargadompul20->save();

      $hargadompul21 = new HargaDompul();
      $hargadompul21->nama_harga_dompul='DP10';
      $hargadompul21->tipe_harga_dompul='CVS3';
      $hargadompul21->harga_dompul=10450;
      $hargadompul21->status_harga_dompul='Aktif';
      $hargadompul21->save();

      $hargadompul22 = new HargaDompul();
      $hargadompul22->nama_harga_dompul='DP5';
      $hargadompul22->tipe_harga_dompul='SERVER1';
      $hargadompul22->harga_dompul=5400;
      $hargadompul22->status_harga_dompul='Aktif';
      $hargadompul22->save();

      $hargadompul23 = new HargaDompul();
      $hargadompul23->nama_harga_dompul='DP10';
      $hargadompul23->tipe_harga_dompul='SERVER1';
      $hargadompul23->harga_dompul=10400;
      $hargadompul23->status_harga_dompul='Aktif';
      $hargadompul23->save();

      $hargadompul24 = new HargaDompul();
      $hargadompul24->nama_harga_dompul='DP5';
      $hargadompul24->tipe_harga_dompul='SERVER2';
      $hargadompul24->harga_dompul=5300;
      $hargadompul24->status_harga_dompul='Aktif';
      $hargadompul24->save();

      $hargadompul25 = new HargaDompul();
      $hargadompul25->nama_harga_dompul='DP10';
      $hargadompul25->tipe_harga_dompul='SERVER2';
      $hargadompul25->harga_dompul=10300;
      $hargadompul25->status_harga_dompul='Aktif';
      $hargadompul25->save();

      $hargadompul26 = new HargaDompul();
      $hargadompul26->nama_harga_dompul='DOMPUL';
      $hargadompul26->tipe_harga_dompul='CVS1';
      $hargadompul26->harga_dompul=0.985;
      $hargadompul26->status_harga_dompul='Aktif';
      $hargadompul26->save();

      $hargadompul27 = new HargaDompul();
      $hargadompul27->nama_harga_dompul='DOMPUL';
      $hargadompul27->tipe_harga_dompul='SERVER1';
      $hargadompul27->harga_dompul=0.985;
      $hargadompul27->status_harga_dompul='Aktif';
      $hargadompul27->save();

      $hargadompul28 = new HargaDompul();
      $hargadompul28->nama_harga_dompul='DOMPUL';
      $hargadompul28->tipe_harga_dompul='CVS2';
      $hargadompul28->harga_dompul=0.985;
      $hargadompul28->status_harga_dompul='Aktif';
      $hargadompul28->save();

      $hargadompul29 = new HargaDompul();
      $hargadompul29->nama_harga_dompul='DOMPUL';
      $hargadompul29->tipe_harga_dompul='CVS3';
      $hargadompul29->harga_dompul=0.985;
      $hargadompul29->status_harga_dompul='Aktif';
      $hargadompul29->save();

      $hargadompul30 = new HargaDompul();
      $hargadompul30->nama_harga_dompul='DOMPUL';
      $hargadompul30->tipe_harga_dompul='SERVER2';
      $hargadompul30->harga_dompul=0.985;
      $hargadompul30->status_harga_dompul='Aktif';
      $hargadompul30->save();
    }
}
