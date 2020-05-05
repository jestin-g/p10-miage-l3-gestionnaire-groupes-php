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
        $this->call(AnnuaireTableSeeder::class);
        $this->call(StatutTableSeeder::class);
        $this->call(GroupTableSeeder::class);
    }
}
