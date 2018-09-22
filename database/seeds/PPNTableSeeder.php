<?php

use Illuminate\Database\Seeder;
use App\PPN;

class PPNTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $ppn1 = new PPN();
      $ppn1->jenis_ppn = 'PPN 5%';
      $ppn1->save();

      $ppn2 = new PPN();
      $ppn2->jenis_ppn = 'PPN 10%';
      $ppn2->save();
    }
}
