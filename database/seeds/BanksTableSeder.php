<?php

use Illuminate\Database\Seeder;
use App\Bank;

class BanksTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bca = new Bank();
        $bca->nama='BCA';
        $bca->save();

        $bri = new Bank();
        $bri->nama='BRI';
        $bri->save();

        $bni = new Bank();
        $bni->nama='BNI';
        $bni->save();

        $mandiri = new Bank();
        $mandiri->nama='Mandiri';
        $mandiri->save();
    }
}
