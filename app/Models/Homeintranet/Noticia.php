<?php

namespace App\Models\Homeintranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{


    use HasFactory;
    //habilito todos los cambpos menos estos
    protected $table = "noticias";
    protected $guarded = ['idNoticias'];

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}
