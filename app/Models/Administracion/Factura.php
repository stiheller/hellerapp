<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factura extends Model
{
    use HasFactory;

    protected $table = "adm_facturas";

    protected $guarded = ['id'];

    public function proveedor()
    {
        return $this->belongsTo('App\Models\Administracion\proveedor', 'proveedor_id', 'id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Administracion\EstadoFactura', 'estado_id', 'id');
    }
    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function tipoFactura()
    {
        return $this->belongsTo('App\Models\Administracion\TipoFactura', 'tipo_id', 'id');
    }

    
}
