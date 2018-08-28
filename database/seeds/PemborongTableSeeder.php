<?php

use Illuminate\Database\Seeder;
use App\Pemborong;

class PemborongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pb1 = new Pemborong();
      $pb1->nm_pb='Annisa Jarizky';
      $pb1->jenis_pb='Pemborong Cat';
      $pb1->jml_ang='14';
      $pb1->save();

      $pb2 = new Pemborong();
      $pb2->nm_pb='M. Hauwin';
      $pb2->jenis_pb='Pemborong Rakit';
      $pb2->jml_ang='19';
      $pb2->save();

      $pb3 = new Pemborong();
      $pb3->nm_pb='Miftahur Rahman';
      $pb3->jenis_pb='Pemborong Fitting';
      $pb3->jml_ang='17';
      $pb3->save();

      $pb4 = new Pemborong();
      $pb4->nm_pb='Nabil Dzaki';
      $pb4->jenis_pb='Pemborong Las';
      $pb4->jml_ang='9';
      $pb4->save();
    }
}
