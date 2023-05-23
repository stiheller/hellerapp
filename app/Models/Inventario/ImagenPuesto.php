<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenPuesto extends Model
{
    use HasFactory;

    protected $table = "inv_imagenes_puesto";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }
}
