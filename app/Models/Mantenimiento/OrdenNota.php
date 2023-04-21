<?php

namespace App\Models\Mantenimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenNota extends Model
{
    use HasFactory;
    protected $table = "mnt_ordenes_notas";
    protected $guarded = ['id'];

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function mntNotasFotos()
    {
        return $this->belongsToMany('App\Models\Mantenimiento\OrdenNotaImagen', 'nota_id', 'id');
    }
}
