<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chequera extends Model
{
    use HasFactory;

    protected $table = "adm_chequeras";
    
    protected $guarded = ['id'];

    public function banco()
    {
        return $this->belongsTo(Banco::class);
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    

        
}

