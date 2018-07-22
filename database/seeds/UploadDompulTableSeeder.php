<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UploadDompulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $upload = new UploadDompul();
      $upload->no_hp_sub_master_dompul='081938062644';
      $upload->nama_sub_master_dompul='SD TUBAN';
      $upload->no_faktur='XL-1703180001S-KOKO';
      $upload->produk='DOMPUL';
      $upload->qty=300000;
      $upload->balance=935770;
      $upload->diskon=1.5;
      $upload->no_hp_downline='087750955792';
      $upload->nama_downline='SASMITA CELL';
      $upload->status='Success';
      $upload->no_hp_canvasser='087805834781';
      $upload->nama_canvasser='GRK-ABDUL-MUIZ';
      $upload->inbox='1';
      $upload->print='False';
      $upload->bayar='Tunai';
      $upload->save();

      $upload2 = new UploadDompul();
      $upload2->no_hp_sub_master_dompul='081938062644';
      $upload2->nama_sub_master_dompul='SD TUBAN';
      $upload2->no_faktur='XL-1703180002S-KOKO';
      $upload2->produk='DOMPUL';
      $upload2->qty=500000;
      $upload2->balance=435770;
      $upload2->diskon=1.5;
      $upload2->no_hp_downline='081913810492';
      $upload2->nama_downline='GRK ID CELL';
      $upload2->status='Success';
      $upload2->no_hp_canvasser='087805834781';
      $upload2->nama_canvasser='GRK-ABDUL-MUIZ';
      $upload2->inbox='1';
      $upload2->print='False';
      $upload2->bayar='Tunai';
      $upload2->save();

      $upload3 = new UploadDompul();
      $upload3->no_hp_sub_master_dompul='081938062644';
      $upload3->nama_sub_master_dompul='SD TUBAN';
      $upload3->no_faktur='XL-1703180002S-KOKO';
      $upload3->produk='DP 10';
      $upload3->qty=30;
      $upload3->balance=4888;
      $upload3->diskon=0;
      $upload3->no_hp_downline='081913810492';
      $upload3->nama_downline='GRK ID CELL';
      $upload3->status='Success';
      $upload3->no_hp_canvasser='087805834781';
      $upload3->nama_canvasser='GRK-ABDUL-MUIZ';
      $upload3->inbox='1';
      $upload3->print='False';
      $upload3->bayar='Tunai';
      $upload3->save();

      $upload4 = new UploadDompul();
      $upload4->no_hp_sub_master_dompul='081938062644';
      $upload4->nama_sub_master_dompul='SD TUBAN';
      $upload4->no_faktur='XL-1703180002S-KOKO';
      $upload4->produk='DP 5';
      $upload4->qty=20;
      $upload4->balance=9852;
      $upload4->diskon=0;
      $upload4->no_hp_downline='081913810492';
      $upload4->nama_downline='GRK ID CELL';
      $upload4->status='Success';
      $upload4->no_hp_canvasser='087805834781';
      $upload4->nama_canvasser='GRK-ABDUL-MUIZ';
      $upload4->inbox='1';
      $upload4->print='False';
      $upload4->bayar='Tunai';
      $upload4->save();

      $upload5 = new UploadDompul();
      $upload5->no_hp_sub_master_dompul='081938062641';
      $upload5->nama_sub_master_dompul='SD SIDOARJO';
      $upload5->no_faktur='XL-1703180003S-KOKO';
      $upload5->produk='DOMPUL';
      $upload5->qty=600000;
      $upload5->balance=4180820;
      $upload5->diskon=1.5;
      $upload5->no_hp_downline='081803000271';
      $upload5->nama_downline='GFR CELL KRIAN';
      $upload5->status='Success';
      $upload5->no_hp_canvasser='081935015005';
      $upload5->nama_canvasser='SDA-AGUS SALIM';
      $upload5->inbox='1';
      $upload5->print='False';
      $upload5->bayar='Tunai';
      $upload5->save();

      $upload6 = new UploadDompul();
      $upload6->no_hp_sub_master_dompul='081938062641';
      $upload6->nama_sub_master_dompul='SD SIDOARJO';
      $upload6->no_faktur='XL-1703180003S-KOKO';
      $upload6->produk='DP 10';
      $upload6->qty=60;
      $upload6->balance=3617;
      $upload6->diskon=0;
      $upload6->no_hp_downline='081803000271';
      $upload6->nama_downline='GFR CELL KRIAN';
      $upload6->status='Success';
      $upload6->no_hp_canvasser='081935015005';
      $upload6->nama_canvasser='SDA-AGUS SALIM';
      $upload6->inbox='1';
      $upload6->print='False';
      $upload6->bayar='Tunai';
      $upload6->save();

      $upload7 = new UploadDompul();
      $upload7->no_hp_sub_master_dompul='081938062641';
      $upload7->nama_sub_master_dompul='SD SIDOARJO';
      $upload7->no_faktur='XL-1703180003S-KOKO';
      $upload7->produk='DP 5';
      $upload7->qty=60;
      $upload7->balance=8965;
      $upload7->diskon=0;
      $upload7->no_hp_downline='081803000271';
      $upload7->nama_downline='GFR CELL KRIAN';
      $upload7->status='Success';
      $upload7->no_hp_canvasser='081935015005';
      $upload7->nama_canvasser='SDA-AGUS SALIM';
      $upload7->inbox='1';
      $upload7->print='False';
      $upload7->bayar='Tunai';
      $upload7->save();

      $upload8 = new UploadDompul();
      $upload8->no_hp_sub_master_dompul='081938062644';
      $upload8->nama_sub_master_dompul='SD TUBAN';
      $upload8->no_faktur='XL-1703180004S-KOKO';
      $upload8->produk='DOMPUL';
      $upload8->qty=200000;
      $upload8->balance=235770;
      $upload8->diskon=1.5;
      $upload8->no_hp_downline='081913810638';
      $upload8->nama_downline='GRK ID 2 CELL';
      $upload8->status='Success';
      $upload8->no_hp_canvasser='087805834781';
      $upload8->nama_canvasser='GRK-ABDUL-MUIZ';
      $upload8->inbox='1';
      $upload8->print='False';
      $upload8->bayar='Tunai';
      $upload8->save();

      $upload9 = new UploadDompul();
      $upload9->no_hp_sub_master_dompul='081938062644';
      $upload9->nama_sub_master_dompul='SD TUBAN';
      $upload9->no_faktur='XL-1703180004S-KOKO';
      $upload9->produk='DP10';
      $upload9->qty=5;
      $upload9->balance=4883;
      $upload9->diskon=0;
      $upload9->no_hp_downline='081913810638';
      $upload9->nama_downline='GRK ID 2 CELL';
      $upload9->status='Success';
      $upload9->no_hp_canvasser='087805834781';
      $upload9->nama_canvasser='GRK-ABDUL-MUIZ';
      $upload9->inbox='1';
      $upload9->print='False';
      $upload9->bayar='Tunai';
      $upload9->save();

      $upload10 = new UploadDompul();
      $upload10->no_hp_sub_master_dompul='081938062644';
      $upload10->nama_sub_master_dompul='SD TUBAN';
      $upload10->no_faktur='XL-1703180004S-KOKO';
      $upload10->produk='DP5';
      $upload10->qty=7;
      $upload10->balance=9845;
      $upload10->diskon=0;
      $upload10->no_hp_downline='081913810638';
      $upload10->nama_downline='GRK ID 2 CELL';
      $upload10->status='Success';
      $upload10->no_hp_canvasser='087805834781';
      $upload10->nama_canvasser='GRK-ABDUL-MUIZ';
      $upload10->inbox='1';
      $upload10->print='False';
      $upload10->bayar='Tunai';
      $upload10->save();
    }
}
