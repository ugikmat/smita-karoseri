<?php

use Illuminate\Database\Seeder;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $lokasi = new Lokasi();
      $lokasi->nm_lokasi='Pamekasan';
      $lokasi->status_lokasi=1;
      $lokasi->save();

      $lokasi2 = new Lokasi();
      $lokasi2->nm_lokasi='Sidoarjo';
      $lokasi2->status_lokasi=1;
      $lokasi2->save();

      $lokasi3 = new Lokasi();
      $lokasi3->nm_lokasi='Madiun';
      $lokasi3->status_lokasi=1;
      $lokasi3->save();
    }
}
