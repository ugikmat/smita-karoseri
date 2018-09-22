<?php

use Illuminate\Database\Seeder;
use App\Supervisor;

class SupervisorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $spv1 = new Supervisor();
      $spv1->nm_spv='Faisal Muzakki';
      $spv1->alamat_spv='Jl. Anggrek No.1';
      $spv1->no_hp='08183459203';
      $spv1->save();

      $spv2 = new Supervisor();
      $spv2->nm_spv='Rahma Melati';
      $spv2->alamat_spv='Jl. Melati No.2';
      $spv2->no_hp='08769302832';
      $spv2->save();

      $spv3 = new Supervisor();
      $spv3->nm_spv='Diah Widyaningsih';
      $spv3->alamat_spv='Jl. Teratai No.98';
      $spv3->no_hp='085739279273';
      $spv3->save();

      $spv4 = new Supervisor();
      $spv4->nm_spv='Rahmat Dicky';
      $spv4->alamat_spv='Jl. Sulawesi No.90';
      $spv4->no_hp='08167892873';
      $spv4->save();

      $spv5 = new Supervisor();
      $spv5->nm_spv='Farah Herzygofah';
      $spv5->alamat_spv='Jl. Sidokumpul No.56';
      $spv5->no_hp='081567926728';
      $spv5->save();

    }
}
