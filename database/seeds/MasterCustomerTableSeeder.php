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
      $subdompul1->no_hp_master_dompul='081938063309';
      $subdompul1->no_hp_sub_master_dompul='081938062640';
      $subdompul1->id_gudang='2';
      $subdompul1->nama_sub_master_dompul='SD ROS SDJ';
      $subdompul1->tipe_dompul='SD';
      $subdompul1->status_sub_master_dompul='Aktif';
      $subdompul1->save();
    }
}
