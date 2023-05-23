<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenScanner extends Model
{
    use HasFactory;

    protected $table = "inv_imagenes_scanner";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scanner(){
        return $this->belongsTo(Scanner::class);
    }
}
