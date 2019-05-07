<?php

use Illuminate\Database\Seeder;
use App\Lokasi;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sublokasi1 = new Lokasi();
      $sublokasi1->nm_lokasi='XL Sampang';
      $sublokasi1->save();

      $sublokasi2 = new Lokasi();
      $sublokasi2->nm_lokasi='XL Pamekasan';
      $sublokasi2->save();

      $sublokasi3 = new Lokasi();
      $sublokasi3->nm_lokasi='XL Bangkalan';
      $sublokasi3->save();

      $sublokasi4 = new Lokasi();
      $sublokasi4->nm_lokasi='Wijaya Baru Kedamean';
      $sublokasi4->save();

      $sublokasi5 = new Lokasi();
      $sublokasi5->nm_lokasi='Wijaya Baru Putat';
      $sublokasi5->save();

      // $lokasi2 = new Lokasi();
      // $lokasi2->nm_lokasi='Sumenep';
      // $lokasi2->status_lokasi=1;
      // $lokasi2->save();
      //
      // $lokasi3 = new Lokasi();
      // $lokasi3->nm_lokasi='Office';
      // $lokasi3->status_lokasi=1;
      // $lokasi3->save();
      //
      // $lokasi4 = new Lokasi();
      // $lokasi4->nm_lokasi='Office SDA';
      // $lokasi4->status_lokasi=1;
      // $lokasi4->save();
      //
      // $lokasi5 = new Lokasi();
      // $lokasi5->nm_lokasi='Madiun';
      // $lokasi5->status_lokasi=1;
      // $lokasi5->save();
      //
      // $lokasi6 = new Lokasi();
      // $lokasi6->nm_lokasi='Ngawi';
      // $lokasi6->status_lokasi=1;
      // $lokasi6->save();
      //
      // $lokasi7 = new Lokasi();
      // $lokasi7->nm_lokasi='Tulungagung';
      // $lokasi7->status_lokasi=1;
      // $lokasi7->save();
      //
      // $lokasi8 = new Lokasi();
      // $lokasi8->nm_lokasi='Bangkalan';
      // $lokasi8->status_lokasi=1;
      // $lokasi8->save();
      //
      // $lokasi9 = new Lokasi();
      // $lokasi9->nm_lokasi='Bojonegoro';
      // $lokasi9->status_lokasi=1;
      // $lokasi9->save();
      //
      // $lokasi10 = new Lokasi();
      // $lokasi10->nm_lokasi='Sampang';
      // $lokasi10->status_lokasi=1;
      // $lokasi10->save();
      //
      // $lokasi11 = new Lokasi();
      // $lokasi11->nm_lokasi='Sidoarjo';
      // $lokasi11->status_lokasi=1;
      // $lokasi11->save();
      //
      // $lokasi12 = new Lokasi();
      // $lokasi12->nm_lokasi='Gresik';
      // $lokasi12->status_lokasi=1;
      // $lokasi12->save();
      //
      // $lokasi13 = new Lokasi();
      // $lokasi13->nm_lokasi='Lamongan';
      // $lokasi13->status_lokasi=1;
      // $lokasi13->save();
      //
      // $lokasi14 = new Lokasi();
      // $lokasi14->nm_lokasi='Jombang';
      // $lokasi14->status_lokasi=1;
      // $lokasi14->save();
      //
      // $lokasi15 = new Lokasi();
      // $lokasi15->nm_lokasi='Mojokerto';
      // $lokasi15->status_lokasi=1;
      // $lokasi15->save();
      //
      // $lokasi16 = new Lokasi();
      // $lokasi16->nm_lokasi='Tuban';
      // $lokasi16->status_lokasi=1;
      // $lokasi16->save();
      //
      // $lokasi17 = new Lokasi();
      // $lokasi17->nm_lokasi='Trenggalek';
      // $lokasi17->status_lokasi=1;
      // $lokasi17->save();
      //
      // $lokasi18 = new Lokasi();
      // $lokasi18->nm_lokasi='Kediri';
      // $lokasi18->status_lokasi=1;
      // $lokasi18->save();
      //
      // $lokasi19 = new Lokasi();
      // $lokasi19->nm_lokasi='Nganjuk';
      // $lokasi19->status_lokasi=1;
      // $lokasi19->save();
      //
      // $lokasi20 = new Lokasi();
      // $lokasi20->nm_lokasi='Blitar';
      // $lokasi20->status_lokasi=1;
      // $lokasi20->save();
      //
      // $lokasi21 = new Lokasi();
      // $lokasi21->nm_lokasi='Pacitan';
      // $lokasi21->status_lokasi=1;
      // $lokasi21->save();
      //
      // $lokasi22 = new Lokasi();
      // $lokasi22->nm_lokasi='Ponorogo';
      // $lokasi22->status_lokasi=1;
      // $lokasi22->save();
    }
}
