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
        $bri->status_bank='Aktif';
        $bri->save();

        $mandiri = new Bank();
        $mandiri->kode_bank='BNK-2';
        $mandiri->nama_bank='Bank Mandiri';
        $mandiri->status_bank='Aktif';
        $mandiri->save();

        $bni = new Bank();
        $bni->kode_bank='BNK-3';
        $bni->nama_bank='Bank BNI';
        $bni->status_bank='Aktif';
        $bni->save();

        $bca = new Bank();
        $bca->kode_bank='BNK-4';
        $bca->nama_bank='Bank BCA (Pusat)';
        $bca->status_bank='Aktif';
        $bca->save();

        $bcas = new Bank();
        $bcas->kode_bank='BNK-5';
        $bcas->nama_bank='Bank BCA Cabang Sidoarjo';
        $bcas->status_bank='Aktif';
        $bcas->save();

        $bcami = new Bank();
        $bcami->kode_bank='BNK-6';
        $bcami->nama_bank='Bank BCA Cabang Madiun';
        $bcami->status_bank='Aktif';
        $bcami->save();

        $bcamu = new Bank();
        $bcamu->kode_bank='BNK-7';
        $bcamu->nama_bank='Bank BCA Cabang Madura';
        $bcamu->status_bank='Aktif';
        $bcamu->save();
    }
}
