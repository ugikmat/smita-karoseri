<?php

use Illuminate\Database\Seeder;

class MasterCustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $table->string('nm_cust');
      $table->string('alamat_cust');
      $table->string('no_hp');
      $table->string('jabatan');
      $table->tinyInteger('status')->default(1);

      $cust1 = new Customer();
      $cust1->nm_cust='SASMITA CELL';
      $cust1->alamat_cust='Bangkalan';
      $cust1->no_hp='087750955792';
      $cust1->jabatan='Owner';
      $cust1->status=1;
      $cust1->save();
    }
}
