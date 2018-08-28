<?php

use Illuminate\Database\Seeder;
use App\SPKC;

class SPKCTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $spkc1 = new SPKC();
      $spkc1->id_cust='1';
      $spkc1->id_bank='1';
      $spkc1->nm_perusahaan='PT Logistik';
      $spkc1->jenis_karoseri='Wings Box';
      $spkc1->jumlah_unit='8';
      $spkc1->harga_total='100000000';
      $spkc1->ket='Harga Total Sudah Termasuk Pajak';
      $spkc1->tanggal='2018-01-21';
      $spkc1->save();

      $spkc2 = new SPKC();
      $spkc2->id_cust='2';
      $spkc2->id_bank='2';
      $spkc2->nm_perusahaan='PT ABCD';
      $spkc2->jenis_karoseri='Fix Side';
      $spkc2->jumlah_unit='2';
      $spkc2->harga_total='20000000';
      $spkc2->ket='Harga Total Sudah Termasuk Pajak';
      $spkc2->tanggal='2018-03-09';
      $spkc2->save();

      $spkc3 = new SPKC();
      $spkc3->id_cust='3';
      $spkc3->id_bank='3';
      $spkc3->nm_perusahaan='PT Maju Jaya';
      $spkc3->jenis_karoseri='Molen';
      $spkc3->jumlah_unit='7';
      $spkc3->harga_total='20000000';
      $spkc3->ket='Harga Total Sudah Termasuk Pajak';
      $spkc3->tanggal='2018-04-09';
      $spkc3->save();

      $spkc4 = new SPKC();
      $spkc4->id_cust='5';
      $spkc4->id_bank='1';
      $spkc4->nm_perusahaan='PT Harapan Jaya';
      $spkc4->jenis_karoseri='Trailler';
      $spkc4->jumlah_unit='2';
      $spkc4->harga_total='80000000';
      $spkc4->ket='Harga Total Sudah Termasuk Pajak';
      $spkc4->tanggal='2018-06-19';
      $spkc4->save();

      $spkc5 = new SPKC();
      $spkc5->id_cust='7';
      $spkc5->id_bank='3';
      $spkc5->nm_perusahaan='PT Dammai Sejahtera';
      $spkc5->jenis_karoseri='Self Loader';
      $spkc5->jumlah_unit='8';
      $spkc5->harga_total='500000000';
      $spkc5->ket='Harga Total Sudah Termasuk Pajak';
      $spkc5->tanggal='2018-07-27';
      $spkc5->save();
    }
}
