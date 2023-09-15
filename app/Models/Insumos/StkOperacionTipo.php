<?php

namespace App\Models\Insumos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StkOperacionTipo extends Model
{
    use HasFactory;
    protected $table = "stk_operaciones_tipo";
    protected $guarded = ['id'];
}
