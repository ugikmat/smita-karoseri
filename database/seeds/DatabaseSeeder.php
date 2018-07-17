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
    }
}
