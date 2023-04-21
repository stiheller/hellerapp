<?php

namespace App\Models\Mantenimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenEstado extends Model
{
    use HasFactory;

    protected $table = "mnt_ordenes_estado";

    protected $guarded = ['id'];
}
