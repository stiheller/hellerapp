<?php

namespace App\Models\Insumos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StkOperacionRotulo extends Model
{
    use HasFactory;
    protected $table = "stk_operaciones_rotulos";
    protected $guarded = ['id'];

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function estado()
    {
        return $this->belongsTo('App\Models\Insumos\StkOperacionEstado', 'estado_id', 'id');
    }
    public function tipo()
    {
        return $this->belongsTo('app\Models\Insumos\StkOperacionTipo', 'operacion_tipo', 'id');
    }

}
