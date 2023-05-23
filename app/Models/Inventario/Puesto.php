<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $table = "inv_puestos";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Para que utilice el Slug, en vez del id, en la ruta.
    public function getRouteKeyName(){
        return "slug";
    }

    //Relación uno a uno Conexión
    public function conexion(){
        return $this->belongsTo(Conexion::class);
    }

    //Relación uno a muchos inversa con Sector
    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    //Relación uno a uno con Equipamiento
    public function equipamiento(){
        return $this->belongsTo(Equipamiento::class);
    }

    //Relación con Imágenes
    public function imagenes(){
        return $this->hasMany(ImagenPuesto::class);
    }
}
