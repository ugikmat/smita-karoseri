<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BanksTableSeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(SatuanTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(DompulTableSeeder::class);
        $this->call(MasterHargaDompulTableSeeder::class);
        $this->call(MasterHargaSPTableSeeder::class);
        $this->call(TipeDompulTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(GudangTableSeeder::class);
        $this->call(LokasiTableSeeder::class);
        $this->call(PemborongTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(SupervisorTableSeeder::class);
        $this->call(CaraBayarTableSeeder::class);
        $this->call(PPNTableSeeder::class);
        //$this->call(SPKCTableSeeder::class);
        // $this->call(UploadDompulTableSeeder::class);
    }
}
