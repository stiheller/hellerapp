<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaRubro extends Model
{
    use HasFactory;

    protected $table = "adm_facturas_rubros";

    protected $guarded = ['id'];

}

