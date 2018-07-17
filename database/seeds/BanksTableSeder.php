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
        $bri->kode_bank='BNK-1';
        $bri->nama_bank='Bank BRI';
        $bri->save();

        $mandiri = new Bank();
        $mandiri->kode_bank='BNK-2';
        $mandiri->nama_bank='Bank Mandiri';
        $mandiri->save();

        $bni = new Bank();
        $bni->kode_bank='BNK-3';
        $bni->nama_bank='Bank BNI';
        $bni->save();

        $bca = new Bank();
        $bca->kode_bank='BNK-4';
        $bca->nama_bank='Bank BCA (Pusat)';
        $bca->save();

        $bcas = new Bank();
        $bcas->kode_bank='BNK-5';
        $bcas->nama_bank='Bank BCA Cabang Sidoarjo';
        $bcas->save();

        $bcami = new Bank();
        $bcami->kode_bank='BNK-6';
        $bcami->nama_bank='Bank BCA Cabang Madiun';
        $bcami->save();

        $bcamu = new Bank();
        $bcamu->kode_bank='BNK-7';
        $bcamu->nama_bank='Bank BCA Cabang Madura';
        $bcamu->save();
    }
}
