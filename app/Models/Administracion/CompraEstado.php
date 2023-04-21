<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraEstado extends Model
{
    use HasFactory;
    protected $table = "adm_compras_estado";
    protected $guarded = ['id'];
}
