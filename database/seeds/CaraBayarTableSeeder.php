<?php

use Illuminate\Database\Seeder;
use App\CaraBayar;

class CaraBayarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carabayar1 = new CaraBayar();
        $carabayar1->keterangan = 'DP 50% diawal. 50% sebelum serah terima unit';
        $carabayar1->save();

        $carabayar2 = new CaraBayar();
        $carabayar2->keterangan = 'DP 40% diawal. 60% sebelum serah terima unit';
        $carabayar2->save();

        $carabayar3 = new CaraBayar();
        $carabayar3->keterangan = 'DP 30% diawal. 70% sebelum serah terima unit';
        $carabayar3->save();

        $carabayar4 = new CaraBayar();
        $carabayar4->keterangan = 'Full Payment Leasing';
        $carabayar4->save();

        $carabayar5 = new CaraBayar();
        $carabayar5->keterangan = 'Full Payment Pribadi';
        $carabayar5->save();

    }
}
