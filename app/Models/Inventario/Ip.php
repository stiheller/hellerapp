<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    use HasFactory;

    protected $table = "inv_ips";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a uno inversa con Conexión
    /* public function conexion(){
        return $this->hasOne(Conexion::class);
    } */
}
