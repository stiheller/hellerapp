<?php

namespace App\Http\Controllers\Utilidades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilidades\PagUtil;

class PagUtilController extends Controller
{
    public function index()
    {
        $paginas = PagUtil::all();

        return view('utilidades.pagutil', compact('paginas'));
    }
}
