<?php

namespace App\Models\Mantenimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = "mnt_ordenes";

    protected $guarded = ['id'];

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function ordenPrioridad()
    {
        return $this->belongsTo('App\Models\Mantenimiento\OrdenPrioridad', 'prioridad_id', 'id');
    }
    public function ordenEstado()
    {
        return $this->belongsTo('App\Models\Mantenimiento\OrdenEstado', 'estado_id', 'id');
    }
    public function ordenPuntaje()
    {
        return $this->belongsTo('App\Models\Mantenimiento\OrdenPuntaje', 'puntaje_id', 'id');
    }
    public function ordenEmpresa()
    {
        return $this->belongsTo('App\Models\Mantenimiento\Empresa', 'empresa_id', 'id');
    }

    public function ordenSector()
    {
        return $this->belongsTo('App\Models\Admin\Sector', 'sector_id', 'id');
    }



}
