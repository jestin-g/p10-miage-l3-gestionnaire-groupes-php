<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();
        Group::create(['libelle' => 'L2_MIASHS']);
        Group::create(['libelle' => 'L3_MIAGE']);
        Group::create(['libelle' => 'L3_MIAGE_APP']);
        Group::create(['libelle' => 'M1_MIAGE']);
        Group::create(['libelle' => 'M1_MIAGE_APP']);
        Group::create(['libelle' => 'M2_MIAGE']);
        Group::create(['libelle' => 'M2_MIAGE_APP']);
    }
}
