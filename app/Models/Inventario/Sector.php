<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = "inv_sectores";

    protected $guarded = ['id', 'created_at', 'updated_at']; //created y updated son entradas por BD.
}
