<?php

use Illuminate\Database\Seeder;
use App\Annuaire;

class AnnuaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Annuaire::truncate();
        Annuaire::create(['libelle' => 'APOGEE']);
        Annuaire::create(['libelle' => 'HARPEGE']);
        Annuaire::create(['libelle' => 'FOMASUP']);
        Annuaire::create(['libelle' => 'AUTRE']);
    }
}
