<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IndividuExport;

class FichierController extends Controller
{
    public function index()
    {
        return view('fichier.index');
    }

    public function export_all_xls()
    {
        return Excel::download(new IndividuExport, 'all_individus.xlsx');
    }

    public function export_all_csv()
    {
        return Excel::download(new IndividuExport, 'all_individus.csv');
    }

}
