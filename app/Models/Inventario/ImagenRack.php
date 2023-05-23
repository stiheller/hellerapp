<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenRack extends Model
{
    use HasFactory;

    protected $table = "inv_imagenes_rack";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function rack(){
        return $this->belongsTo(Rack::class);
    }
}
