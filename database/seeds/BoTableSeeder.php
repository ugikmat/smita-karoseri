<?php

use Illuminate\Database\Seeder;
use App\BO;
class BoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $bo = new BO();
      $bo->id_ho=1;
      $bo->kode_bo='PMN';
      $bo->nama_bo='Pamekasan';
      $bo->no_hp_sub_master_dompul='';
      $bo->status_bo=1;
      $bo->save();

      $bo2 = new BO();
      $bo2->id_ho=1;
      $bo2->kode_bo='SMP';
      $bo2->nama_bo='Sumenep';
      $bo2->no_hp_sub_master_dompul='';
      $bo2->status_bo=1;
      $bo2->save();

      $bo3 = new BO();
      $bo3->id_ho=2;
      $bo3->kode_bo='OFF';
      $bo3->nama_bo='Office';
      $bo3->no_hp_sub_master_dompul='';
      $bo3->status_bo=1;
      $bo3->save();

      $bo4 = new BO();
      $bo4->id_ho=2;
      $bo4->kode_bo='OFS';
      $bo4->nama_bo='Office SDA';
      $bo4->no_hp_sub_master_dompul='';
      $bo4->status_bo=1;
      $bo4->save();

      $bo5 = new BO();
      $bo5->id_ho=3;
      $bo5->kode_bo='MDN';
      $bo5->nama_bo='Madiun';
      $bo5->no_hp_sub_master_dompul='';
      $bo5->status_bo=1;
      $bo5->save();

      $bo6 = new BO();
      $bo6->id_ho=3;
      $bo6->kode_bo='NGW';
      $bo6->nama_bo='Ngawi';
      $bo6->no_hp_sub_master_dompul='';
      $bo6->status_bo=1;
      $bo6->save();

      $bo7 = new BO();
      $bo7->id_ho=3;
      $bo7->kode_bo='TLG';
      $bo7->nama_bo='Tulungagung';
      $bo7->no_hp_sub_master_dompul='';
      $bo7->status_bo=1;
      $bo7->save();

      $bo8 = new BO();
      $bo8->id_ho=1;
      $bo8->kode_bo='BKL';
      $bo8->nama_bo='Bangkalan';
      $bo8->no_hp_sub_master_dompul='';
      $bo8->status_bo=1;
      $bo8->save();

      $bo9 = new BO();
      $bo9->id_ho=2;
      $bo9->kode_bo='BJN';
      $bo9->nama_bo='Bojonegoro';
      $bo9->no_hp_sub_master_dompul='';
      $bo9->status_bo=1;
      $bo9->save();

      $bo10 = new BO();
      $bo10->id_ho=1;
      $bo10->kode_bo='SMP';
      $bo10->nama_bo='Sampang';
      $bo10->no_hp_sub_master_dompul='';
      $bo10->status_bo=1;
      $bo10->save();

      $bo11 = new BO();
      $bo11->id_ho=2;
      $bo11->kode_bo='SDA';
      $bo11->nama_bo='Sidoarjo';
      $bo11->no_hp_sub_master_dompul='081998062641';
      $bo11->status_bo=1;
      $bo11->save();

      $bo12 = new BO();
      $bo12->id_ho=2;
      $bo12->kode_bo='GRK';
      $bo12->nama_bo='Gresik';
      $bo12->no_hp_sub_master_dompul='';
      $bo12->status_bo=1;
      $bo12->save();

      $bo13 = new BO();
      $bo13->id_ho=2;
      $bo13->kode_bo='LMG';
      $bo13->nama_bo='Lamongan';
      $bo13->no_hp_sub_master_dompul='';
      $bo13->status_bo=1;
      $bo13->save();

      $bo14 = new BO();
      $bo14->id_ho=2;
      $bo14->kode_bo='JMB';
      $bo14->nama_bo='Jombang';
      $bo14->no_hp_sub_master_dompul='';
      $bo14->status_bo=1;
      $bo14->save();

      $bo15 = new BO();
      $bo15->id_ho=2;
      $bo15->kode_bo='MJK';
      $bo15->nama_bo='Mojokerto';
      $bo15->no_hp_sub_master_dompul='';
      $bo15->status_bo=1;
      $bo15->save();

      $bo16 = new BO();
      $bo16->id_ho=2;
      $bo16->kode_bo='TBN';
      $bo16->nama_bo='Tuban';
      $bo16->no_hp_sub_master_dompul='081938062644';
      $bo16->status_bo=1;
      $bo16->save();

      $bo17 = new BO();
      $bo17->id_ho=3;
      $bo17->kode_bo='TRK';
      $bo17->nama_bo='Trenggalek';
      $bo17->no_hp_sub_master_dompul='';
      $bo17->status_bo=0;
      $bo17->save();

      $bo18 = new BO();
      $bo18->id_ho=3;
      $bo18->kode_bo='KDR';
      $bo18->nama_bo='Kediri';
      $bo18->no_hp_sub_master_dompul='';
      $bo18->status_bo=0;
      $bo18->save();

      $bo19 = new BO();
      $bo19->id_ho=3;
      $bo19->kode_bo='NJK';
      $bo19->nama_bo='Nganjuk';
      $bo19->no_hp_sub_master_dompul='';
      $bo19->status_bo=0;
      $bo19->save();

      $bo20 = new BO();
      $bo20->id_ho=3;
      $bo20->kode_bo='BTR';
      $bo20->nama_bo='Blitar';
      $bo20->no_hp_sub_master_dompul='';
      $bo20->status_bo=0;
      $bo20->save();

      $bo21 = new BO();
      $bo21->id_ho=3;
      $bo21->kode_bo='PCT';
      $bo21->nama_bo='Pacitan';
      $bo21->no_hp_sub_master_dompul='';
      $bo21->status_bo=0;
      $bo21->save();

      $bo22 = new BO();
      $bo22->id_ho=3;
      $bo22->kode_bo='PNG';
      $bo22->nama_bo='Ponorogo';
      $bo22->no_hp_sub_master_dompul='';
      $bo22->status_bo=0;
      $bo22->save();

      $bo23 = new BO();
      $bo23->id_ho=1;
      $bo23->kode_bo='MDR';
      $bo23->nama_bo='Madura';
      $bo23->no_hp_sub_master_dompul='';
      $bo23->status_bo=0;
      $bo23->save();

      $bo24 = new BO();
      $bo24->id_ho=3;
      $bo24->kode_bo='MGN';
      $bo24->nama_bo='Magetan';
      $bo24->no_hp_sub_master_dompul='';
      $bo24->status_bo=0;
      $bo24->save();
    }
}
