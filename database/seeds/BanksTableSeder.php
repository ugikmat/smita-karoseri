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
        $bri = new Bank();
        $bri->id='BNK-1';
        $bri->nama='Bank BRI';
        $bri->save();

        $mandiri = new Bank();
        $mandiri->id='BNK-2';
        $mandiri->nama='Bank Mandiri';
        $mandiri->save();

        $bni = new Bank();
        $bni->id='BNK-3';
        $bni->nama='Bank BNI';
        $bni->save();

        $bca = new Bank();
        $bca->id='BNK-4';
        $bca->nama='Bank BCA (Pusat)';
        $bca->save();

        $bcas = new Bank();
        $bcas->id='BNK-5';
        $bcas->nama='Bank BCA Cabang Sidoarjo';
        $bcas->save();

        $bcami = new Bank();
        $bcami->id='BNK-6';
        $bcami->nama='Bank BCA Cabang Madiun';
        $bcami->save();

        $bcamu = new Bank();
        $bcamu->id='BNK-7';
        $bcamu->nama='Bank BCA Cabang Madura';
        $bcamu->save();
    }
}
