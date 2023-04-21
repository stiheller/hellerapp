<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;

    protected $table = "adm_bancos";

    protected $guarded = ['id'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}
