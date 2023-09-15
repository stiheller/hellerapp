<?php

namespace App\Models\Insumos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = "stk_insumos";

    protected $guarded = ['id'];

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function grupo()
    {
        return $this->belongsTo('App\Models\Insumos\Grupo', 'grupo_id', 'id');
    }
}
