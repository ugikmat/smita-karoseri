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
        $dompul->id_sales=15;
        $dompul->id_ho=2;
        $dompul->id_bo=12;
        $dompul->no_hp_kios='081938545920';
        $dompul->no_user='7';
        $dompul->bca_pusat='';
        $dompul->bca_cabang='';
        $dompul->mandiri='';
        $dompul->bni='';
        $dompul->bri='';
        $dompul->grand_total=49250;
        $dompul->bayar_tunai=49250;
        $dompul->bayar_transfer=0;
        $dompul->bayar_transfer2=0;
        $dompul->bayar_transfer3=0;
        $dompul->catatan='';
        $dompul->status_pembayaran=0;
        $dompul->status_penjualan=1;
        $dompul->deleted=0;
        $dompul->save();

        $dompul2 = new PenjualanDompul();
        $dompul2->id_penjualan_dompul='DP/H2/GRK/17110002';
        $dompul2->id_sales=15;
        $dompul2->id_ho=2;
        $dompul2->id_bo=12;
        $dompul2->no_hp_kios='081938545961';
        $dompul2->no_user='7';
        $dompul2->bca_pusat='';
        $dompul2->bca_cabang='';
        $dompul2->mandiri='';
        $dompul2->bni='';
        $dompul2->bri='';
        $dompul2->grand_total=607000;
        $dompul2->bayar_tunai=607000;
        $dompul2->bayar_transfer=0;
        $dompul2->bayar_transfer2=0;
        $dompul2->bayar_transfer3=0;
        $dompul2->catatan='';
        $dompul2->status_pembayaran=1;
        $dompul2->status_penjualan=1;
        $dompul2->deleted=0;
        $dompul2->save();
    }
}
