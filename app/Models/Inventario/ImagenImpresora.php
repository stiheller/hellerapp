<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenImpresora extends Model
{
    use HasFactory;

    protected $table = "inv_imagenes_impresora";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function impresora(){
        return $this->belongsTo(Impresora::class);
    }
}
