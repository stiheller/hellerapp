<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenConmutador extends Model
{
    use HasFactory;

    protected $table = "inv_imagenes_conmutador";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function conmutador(){
        return $this->belongsTo(Conmutador::class);
    }
}
