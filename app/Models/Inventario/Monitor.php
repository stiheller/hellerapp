<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;

    protected $table = "inv_monitores";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos inversa con Equipamiento
    public function equipamiento(){
        return $this->belongsTo(Equipamiento::class);
    }

    /* public function imagenes(){
        return $this->hasMany(ImagenMonitor::class);
    } */
}
