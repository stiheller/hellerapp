<?php

namespace App\Models\Mantenimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenPrioridad extends Model
{
    use HasFactory;

    protected $table = "mnt_ordenes_prioridad";

    protected $guarded = ['id'];
}
