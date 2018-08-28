<?php

use Illuminate\Database\Seeder;
use App\Lokasi;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sublokasi1 = new Lokasi();
      $sublokasi1->nm_lokasi='XL Sampang';
      $sublokasi1->save();

      $sublokasi2 = new Lokasi();
      $sublokasi2->nm_lokasi='XL Pamekasan';
      $sublokasi2->save();

      $sublokasi3 = new Lokasi();
      $sublokasi3->nm_lokasi='XL Bangkalan';
      $sublokasi3->save();

      $sublokasi4 = new Lokasi();
      $sublokasi4->nm_lokasi='Wijaya Baru Kedamean';
      $sublokasi4->save();

      $sublokasi5 = new Lokasi();
      $sublokasi5->nm_lokasi='Wijaya Baru Putat';
      $sublokasi5->save();
    }
}
