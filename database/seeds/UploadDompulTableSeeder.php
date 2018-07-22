<?php

use Illuminate\Database\Seeder;

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
      $upload->no_hp_sub_master_dompul='081938062641';
      $upload->nama_sub_master_dompul='SD SIDOARJO';
      $upload->no_faktur='XL-1609290001S-KOKO';
      $upload->produk='DOMPUL';
      $upload->qty=1000000;
      $upload->balance=98856348;
      $upload->diskon=1.5;
      $upload->no_hp_downline='08179360960';
      $upload->nama_downline='NURI CELL';
      $upload->status='Success';
      $upload->no_hp_canvasser='081949761697';
      $upload->nama_canvasser='SDA-ANGGER DIAN W';
      $upload->print='False';
      $upload->bayar='Kredit';
      $upload->save();

      $upload2 = new UploadDompul();
      $upload2->no_hp_sub_master_dompul='081938062641';
      $upload2->nama_sub_master_dompul='SD SIDOARJO';
      $upload2->no_faktur='XL-1609290001S-KOKO';
      $upload2->produk='DP10';
      $upload2->qty=40;
      $upload2->balance=8321;
      $upload2->diskon=0;
      $upload2->no_hp_downline='08179360960';
      $upload2->nama_downline='NURI CELL';
      $upload2->status='Success';
      $upload2->no_hp_canvasser='081949761697';
      $upload2->nama_canvasser='SDA-ANGGER DIAN W';
      $upload2->print='False';
      $upload2->bayar='Kredit';
      $upload2->save();

      $upload3 = new UploadDompul();
      $upload3->no_hp_sub_master_dompul='081938062641';
      $upload3->nama_sub_master_dompul='SD SIDOARJO';
      $upload3->no_faktur='XL-1609290001S-KOKO';
      $upload3->produk='DP5';
      $upload3->qty=20;
      $upload3->balance=4949;
      $upload3->diskon=0;
      $upload3->no_hp_downline='08179360960';
      $upload3->nama_downline='NURI CELL';
      $upload3->status='Success';
      $upload3->no_hp_canvasser='081949761697';
      $upload3->nama_canvasser='SDA-ANGGER DIAN W';
      $upload3->print='False';
      $upload3->bayar='Kredit';
      $upload3->save();

      $upload4 = new UploadDompul();
      $upload4->no_hp_sub_master_dompul='081938062641';
      $upload4->nama_sub_master_dompul='SD SIDOARJO';
      $upload4->no_faktur='XL-1609290002S-KOKO';
      $upload4->produk='DOMPUL';
      $upload4->qty=300000;
      $upload4->balance=98556348;
      $upload4->diskon=1.5;
      $upload4->no_hp_downline='081938063186';
      $upload4->nama_downline='DEWI CELL';
      $upload4->status='Success';
      $upload4->no_hp_canvasser='081949761697';
      $upload4->nama_canvasser='SDA-ANGGER DIAN W';
      $upload4->print='False';
      $upload4->bayar='Kredit';
      $upload4->save();

      $upload5 = new UploadDompul();
      $upload5->no_hp_sub_master_dompul='081938062641';
      $upload5->nama_sub_master_dompul='SD SIDOARJO';
      $upload5->no_faktur='XL-1609290002S-KOKO';
      $upload5->produk='DP10';
      $upload5->qty=25;
      $upload5->balance=8296;
      $upload5->diskon=0;
      $upload5->no_hp_downline='081938063186';
      $upload5->nama_downline='DEWI CELL';
      $upload5->status='Success';
      $upload5->no_hp_canvasser='081949761697';
      $upload5->nama_canvasser='SDA-ANGGER DIAN W';
      $upload5->print='False';
      $upload5->bayar='Kredit';
      $upload5->save();

      $upload6 = new UploadDompul();
      $upload6->no_hp_sub_master_dompul='081938062641';
      $upload6->nama_sub_master_dompul='SD SIDOARJO';
      $upload6->no_faktur='XL-1609290002S-KOKO';
      $upload6->produk='DP5';
      $upload6->qty=15;
      $upload6->balance=4934;
      $upload6->diskon=0;
      $upload6->no_hp_downline='081938063186';
      $upload6->nama_downline='DEWI CELL';
      $upload6->status='Success';
      $upload6->no_hp_canvasser='081949761697';
      $upload6->nama_canvasser='SDA-ANGGER DIAN W';
      $upload6->print='False';
      $upload6->bayar='Kredit';
      $upload6->save();

      $upload7 = new UploadDompul();
      $upload7->no_hp_sub_master_dompul='081938062641';
      $upload7->nama_sub_master_dompul='SD SIDOARJO';
      $upload7->no_faktur='XL-1609290003S-KOKO';
      $upload7->produk='DOMPUL';
      $upload7->qty=200000;
      $upload7->balance=98356348;
      $upload7->diskon=1.5;
      $upload7->no_hp_downline='081938062597';
      $upload7->nama_downline='WB 2 CELL WEDORO';
      $upload7->status='Success';
      $upload7->no_hp_canvasser='081949761697';
      $upload7->nama_canvasser='SDA-ANGGER DIAN W';
      $upload7->print='False';
      $upload7->bayar='Kredit';
      $upload7->save();

      $upload8 = new UploadDompul();
      $upload8->no_hp_sub_master_dompul='081938062641';
      $upload8->nama_sub_master_dompul='SD SIDOARJO';
      $upload8->no_faktur='XL-1609290003S-KOKO';
      $upload8->produk='DP10';
      $upload8->qty=10;
      $upload8->balance=8286;
      $upload8->diskon=0;
      $upload8->no_hp_downline='081938062597';
      $upload8->nama_downline='WB 2 CELL WEDORO';
      $upload8->status='Success';
      $upload8->no_hp_canvasser='081949761697';
      $upload8->nama_canvasser='SDA-ANGGER DIAN W';
      $upload8->print='False';
      $upload8->bayar='Kredit';
      $upload8->save();

      $upload9 = new UploadDompul();
      $upload9->no_hp_sub_master_dompul='081938062641';
      $upload9->nama_sub_master_dompul='SD SIDOARJO';
      $upload9->no_faktur='XL-1609290003S-KOKO';
      $upload9->produk='DP5';
      $upload9->qty=10;
      $upload9->balance=4924;
      $upload9->diskon=0;
      $upload9->no_hp_downline='081938062597';
      $upload9->nama_downline='WB 2 CELL WEDORO';
      $upload9->status='Success';
      $upload9->no_hp_canvasser='081949761697';
      $upload9->nama_canvasser='SDA-ANGGER DIAN W';
      $upload9->print='False';
      $upload9->bayar='Kredit';
      $upload9->save();

      $upload10 = new UploadDompul();
      $upload10->no_hp_sub_master_dompul='081938063309';
      $upload10->nama_sub_master_dompul='MD';
      $upload10->no_faktur='XL-1609290001-KOKO';
      $upload10->produk='DP10';
      $upload10->qty=10000;
      $upload10->balance=160865;
      $upload10->diskon=0;
      $upload10->no_hp_downline='081938062642';
      $upload10->nama_downline='SD MJK-JMB';
      $upload10->status='Success';
      $upload10->no_hp_canvasser='08175207075';
      $upload10->nama_canvasser='DENY DWIYANTO';
      $upload10->print='False';
      $upload10->bayar='Tunai';
      $upload10->save();
    }
}
