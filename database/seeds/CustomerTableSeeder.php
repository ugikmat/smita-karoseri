<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subcustomer1 = new Customer();
        $subcustomer1->nm_cust='Salamun Rohman';
        $subcustomer1->alamat_cust='Puri Gunung Anyar Regency';
        $subcustomer1->no_hp='08121713320';
        $subcustomer1->jabatan='owner';
        $subcustomer1->save();

        $subcustomer2 = new Customer();
        $subcustomer2->nm_cust='Ekohariyadi';
        $subcustomer2->alamat_cust='Jl. Ikan Nilam M-4 Sidoarjo';
        $subcustomer2->no_hp='08155078973';
        $subcustomer2->jabatan='owner';
        $subcustomer2->save();

        $subcustomer3 = new Customer();
        $subcustomer3->nm_cust='Dedy Rahman P';
        $subcustomer3->alamat_cust='Palm Spring Regency Blok A/26 Jambangan';
        $subcustomer3->no_hp='08123220710';
        $subcustomer3->jabatan='owner';
        $subcustomer3->save();

        $subcustomer4 = new Customer();
        $subcustomer4->nm_cust='Meini Sondang S';
        $subcustomer4->alamat_cust='Baratajaya IV/104 Surabaya';
        $subcustomer4->no_hp='0818336488';
        $subcustomer4->jabatan='owner';
        $subcustomer4->save();

        $subcustomer5 = new Customer();
        $subcustomer5->nm_cust='Ardhini Warih Utami';
        $subcustomer5->alamat_cust='Jojoran III C/58 Surabaya';
        $subcustomer5->no_hp='0818595272';
        $subcustomer5->jabatan='owner';
        $subcustomer5->save();

        $subcustomer6 = new Customer();
        $subcustomer6->nm_cust='SASMITA CELL';
        $subcustomer6->alamat_cust='Gresik';
        $subcustomer6->no_hp='087750955792';
        $subcustomer6->jabatan='owner';
        $subcustomer6->save();

        $subcustomer7 = new Customer();
        $subcustomer7->nm_cust='GFR CELL KRIAN';
        $subcustomer7->alamat_cust='Sidoarjo';
        $subcustomer7->no_hp='081803000271';
        $subcustomer7->jabatan='owner';
        $subcustomer7->save();

        $subcustomer8 = new Customer();
        $subcustomer8->nm_cust='SUNTORO CELLKRIAN';
        $subcustomer8->alamat_cust='Sidoarjo';
        $subcustomer8->no_hp='081938450042';
        $subcustomer8->jabatan='owner';
        $subcustomer8->save();

        $subcustomer9 = new Customer();
        $subcustomer9->nm_cust='PULSA PULSA';
        $subcustomer9->alamat_cust='Jombang';
        $subcustomer9->no_hp='081913132540';
        $subcustomer9->jabatan='owner';
        $subcustomer9->save();

        $subcustomer10 = new Customer();
        $subcustomer10->nm_cust='CYBER CELL';
        $subcustomer10->alamat_cust='Bojonegoro';
        $subcustomer10->no_hp='081913132354';
        $subcustomer10->jabatan='owner';
        $subcustomer10->save();
    }
}
