<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    use HasFactory;

    protected $table = "inv_cpus";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a uno inversa con Equipamiento
    public  function equipamiento(){
        return $this->belongsTo(Equipamiento::class);
    }


    /* public function imagenes(){
        return $this->hasMany(ImagenCpu::class);
    } */

    //Relación uno a uno polimórfica:
    /* public function image(){
        return $this->morphOne(Image::class, 'imageable');
    } */
}
