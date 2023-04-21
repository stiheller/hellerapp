<?php

namespace App\Models\Mantenimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenPuntaje extends Model
{
    use HasFactory;

    protected $table = "mnt_ordenes_puntaje";

    protected $guarded = ['id'];
}

