<?php

namespace App\Http\Controllers\Utilidades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilidades\Interno;

class InternoController extends Controller
{
    public function index()
    {
        $internos = Interno::all();

        return view('utilidades.internos', compact('internos'));
    }
}
