<?php

use Illuminate\Database\Seeder;

class HoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $ho = new Ho();
      $ho->kode_ho='H1';
      $ho->nama_ho='HO Pamekasan';
      $ho->status_ho=1;
      $ho->save();

      $ho2 = new Ho();
      $ho2->kode_ho='H2';
      $ho2->nama_ho='HO Sidoarjo';
      $ho2->status_ho=1;
      $ho2->save();

      $ho3 = new Ho();
      $ho3->kode_ho='H3';
      $ho3->nama_ho='HO Madiun';
      $ho3->status_ho=1;
      $ho3->save();
    }
}
