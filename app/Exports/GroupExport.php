<?php

namespace App\Exports;

use DB;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class GroupExport implements FromQuery
{

    use Exportable;

    public function __construct(int $groupe_id, int $annee)
    {
        $this->groupe_id = $groupe_id;
        $this->annee = $annee;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $query = DB::table('individus')
        ->select('nom', 'prenom', 'email', 'num')
        ->join('appartenances', 'individus.id', '=', 'appartenances.individu_id')
        ->where('appartenances.groupe_id', '=', $this->groupe_id)
        ->where('appartenances.annee', $this->annee.'-01-01')
        ->orderBy('nom', 'asc');

        return $query;
    }
}
