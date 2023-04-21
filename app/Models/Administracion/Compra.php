<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Compra extends Model
{
    use HasFactory;

    protected $table = "adm_compras";
    protected $guarded = ['id'];

    public function estado()
    {
        return $this->belongsTo('App\Models\Administracion\CompraEstado', 'estado_id', 'id');
    }
    public function prioridad()
    {
        return $this->belongsTo('App\Models\Administracion\CompraPrioridad', 'prioridad_id', 'id');
    }
    public function sector()
    {
        return $this->belongsTo('App\Models\Admin\Sector', 'sector_id', 'id');
    }
    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
