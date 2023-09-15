<?php

namespace App\Models\Insumos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StkOperacionDetalle extends Model
{
    use HasFactory;
    protected $table = "stk_operaciones_detalle";
    protected $guarded = ['id'];
    
}
