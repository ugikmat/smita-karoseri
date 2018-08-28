<?php

use Illuminate\Database\Seeder;
use App\Gudang;

class GudangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subgudang1 = new Gudang();
      $subgudang1->alamat_gudang='Gudang Utama Sampang';
      $subgudang1->id_lokasi='1';
      $subgudang1->save();

      $subgudang2 = new Gudang();
      $subgudang2->alamat_gudang='Gudang Cadangan Sampang';
      $subgudang2->id_lokasi='1';
      $subgudang2->save();

      $subgudang3 = new Gudang();
      $subgudang3->alamat_gudang='Gudang Utama Pamekasan';
      $subgudang3->id_lokasi='2';
      $subgudang3->save();

      $subgudang4 = new Gudang();
      $subgudang4->alamat_gudang='Gudang Cadangan Pamekasan';
      $subgudang4->id_lokasi='2';
      $subgudang4->save();

      $subgudang5 = new Gudang();
      $subgudang5->alamat_gudang='Gudang Utama Bangkalan';
      $subgudang5->id_lokasi='3';
      $subgudang5->save();

      $subgudang6 = new Gudang();
      $subgudang6->alamat_gudang='Gudang Cadangan Bangkalan';
      $subgudang6->id_lokasi='3';
      $subgudang6->save();

      $subgudang7 = new Gudang();
      $subgudang7->alamat_gudang='Gudang Bahan Baku Kedamean';
      $subgudang7->id_lokasi='4';
      $subgudang7->save();

      $subgudang8 = new Gudang();
      $subgudang8->alamat_gudang='Gudang Produksi Kedamean';
      $subgudang8->id_lokasi='4';
      $subgudang8->save();

      $subgudang9 = new Gudang();
      $subgudang9->alamat_gudang='Gudang Bahan Baku Putat';
      $subgudang9->id_lokasi='5';
      $subgudang9->save();

      $subgudang10 = new Gudang();
      $subgudang10->alamat_gudang='Gudang Produksi Putat';
      $subgudang10->id_lokasi='5';
      $subgudang10->save();
  }
    
}
