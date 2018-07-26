<?php

use Illuminate\Database\Seeder;
use App\PenjualanDompul;

class PenjualanDompulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dompul = new PenjualanDompul();
        $dompul->id_penjualan_dompul='DP/H2/GRK/17110001';
        $dompul->id_sales=15;
        $dompul->id_ho=2;
        $dompul->id_bo=12;
        $dompul->no_hp_kios='081938545920';
        $dompul->no_user='7';
        $dompul->bank='';
        $dompul->bank2='';
        $dompul->bank3='';
        $dompul->grand_total=49250;
        $dompul->bayar_tunai=49250;
        $dompul->bayar_transfer=0;
        $dompul->bayar_transfer2=0;
        $dompul->bayar_transfer3=0;
        $dompul->catatan='';
        $dompul->status_pembayaran=1;
        $dompul->status_penjualan=1;
        $dompul->deleted=0;
        $dompul->save();

        $dompul = new PenjualanDompul();
        $dompul->id_penjualan_dompul='DP/H2/GRK/17110002';
        $dompul->id_sales=15;
        $dompul->id_ho=2;
        $dompul->id_bo=12;
        $dompul->no_hp_kios='081938545961';
        $dompul->no_user='7';
        $dompul->bank='';
        $dompul->bank2='';
        $dompul->bank3='';
        $dompul->grand_total=607000;
        $dompul->bayar_tunai=607000;
        $dompul->bayar_transfer=0;
        $dompul->bayar_transfer2=0;
        $dompul->bayar_transfer3=0;
        $dompul->catatan='';
        $dompul->status_pembayaran=1;
        $dompul->status_penjualan=1;
        $dompul->deleted=0;
        $dompul->save();
    }
}
