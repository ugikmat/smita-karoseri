<?php

use Illuminate\Database\Seeder;
use App\Sales;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subsales1 = new Sales();
        $subsales1->nm_sales='Selvi';
        $subsales1->alamat_sales='Gresik';
        $subsales1->no_hp='082761892123';
        $subsales1->save();

        $subsales2 = new Sales();
        $subsales2->nm_sales='Abdul Muiz';
        $subsales2->alamat_sales='Gresik';
        $subsales2->no_hp='087805834781';
        $subsales2->save();

        $subsales3 = new Sales();
        $subsales3->nm_sales='Misbahul Ulum';
        $subsales3->alamat_sales='Gresik';
        $subsales3->no_hp='087819554765';
        $subsales3->save();

        $subsales4 = new Sales();
        $subsales4->nm_sales='Hanif Ashar';
        $subsales4->alamat_sales='Gresik';
        $subsales4->no_hp='087753094222';
        $subsales4->save();

        $subsales5 = new Sales();
        $subsales5->nm_sales='Agus Salim';
        $subsales5->alamat_sales='Sidoarjo';
        $subsales5->no_hp='081935015005';
        $subsales5->save();

        $subsales6 = new Sales();
        $subsales6->nm_sales='Kesuma Reshi';
        $subsales6->alamat_sales='Sidoarjo';
        $subsales6->no_hp='087701111762';
        $subsales6->save();

        $subsales7 = new Sales();
        $subsales7->nm_sales='Fauzy Ahdiat';
        $subsales7->alamat_sales='Sidoarjo';
        $subsales7->no_hp='087852821951';
        $subsales7->save();

        $subsales8 = new Sales();
        $subsales8->nm_sales='Miftakhur Rozak';
        $subsales8->alamat_sales='Jombang';
        $subsales8->no_hp='087752623999';
        $subsales8->save();

        $subsales9 = new Sales();
        $subsales9->nm_sales='Agus Susanto';
        $subsales9->alamat_sales='Bojonegoro';
        $subsales9->no_hp='087753167878';
        $subsales9->save();

        $subsales10 = new Sales();
        $subsales10->nm_sales='Puji Karyono';
        $subsales10->alamat_sales='Mojokerto';
        $subsales10->no_hp='087702406667';
        $subsales10->save();
    }
}
