<?php

use Illuminate\Database\Seeder;
use App\TipeDompul;

class TipeDompulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tipedompul = new TipeDompul();
      $tipedompul->tipe_dompul='DS';
      $tipedompul->save();

      $tipedompul2 = new TipeDompul();
      $tipedompul2->tipe_dompul='CVS';
      $tipedompul2->save();

      $tipedompul3 = new TipeDompul();
      $tipedompul3->tipe_dompul='HI';
      $tipedompul3->save();

      $tipedompul4 = new TipeDompul();
      $tipedompul4->tipe_dompul='SERVER';
      $tipedompul4->save();

      $tipedompul5 = new TipeDompul();
      $tipedompul5->tipe_dompul='SDE';
      $tipedompul5->save();

      $tipedompul6 = new TipeDompul();
      $tipedompul6->tipe_dompul='CVS1';
      $tipedompul6->save();

      $tipedompul7 = new TipeDompul();
      $tipedompul7->tipe_dompul='CVS2';
      $tipedompul7->save();

      $tipedompul8 = new TipeDompul();
      $tipedompul8->tipe_dompul='CVS3';
      $tipedompul8->save();

      $tipedompul9 = new TipeDompul();
      $tipedompul9->tipe_dompul='SERVER1';
      $tipedompul9->save();

      $tipedompul10 = new TipeDompul();
      $tipedompul10->tipe_dompul='SERVER2';
      $tipedompul10->save();
    }
}
