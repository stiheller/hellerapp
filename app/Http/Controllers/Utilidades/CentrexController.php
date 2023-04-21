<?php

namespace App\Http\Controllers\Utilidades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilidades\Centrex;

class CentrexController extends Controller
{
    public function index()
    {
        $centrex = Centrex::all();

        return view('utilidades.centrex', compact('centrex'));
    }
}
