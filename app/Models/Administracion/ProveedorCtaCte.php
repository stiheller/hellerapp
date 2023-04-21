<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorCtaCte extends Model
{
    use HasFactory;
    protected $table = "adm_proveedores_ctacte";
    protected $guarded = ['id'];
}
