<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FichierController extends Controller
{
    public function index()
    {
        return view('fichier.index');
    }
}
