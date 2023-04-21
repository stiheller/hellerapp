<?php

namespace App\Models\Mantenimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenNotaImagen extends Model
{
    use HasFactory;
    protected $table = "mnt_ordenes_notas_imagenes";
    protected $guarded = ['id'];
}
