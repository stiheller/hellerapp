<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenMonitor extends Model
{
    use HasFactory;

    protected $table = "inv_imagenes_monitor";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function monitor(){
        return $this->belongsTo(Monitor::class);
    }
}
