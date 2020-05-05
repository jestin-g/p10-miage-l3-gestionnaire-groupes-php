<?php

use Illuminate\Database\Seeder;
use App\Statut;

class StatutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statut::truncate();
        Statut::create(['libelle' => 'ETU']);
        Statut::create(['libelle' => 'PR']);
        Statut::create(['libelle' => 'MCF']);
        Statut::create(['libelle' => 'VAC_EXT']);
        Statut::create(['libelle' => 'VAC_INT']);
        Statut::create(['libelle' => 'AUTRE']);
    }
}
