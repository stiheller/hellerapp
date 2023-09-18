<?php

namespace App\Http\Controllers\Insumos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositoCentral extends Controller
{
    public function index(){
        return view('insumos.depositocentral.ingresos');
    }
    
}
