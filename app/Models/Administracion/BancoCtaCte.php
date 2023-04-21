<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BancoCtaCte extends Model
{
    use HasFactory;
    protected $table = "adm_bancos_ctacte";

    protected $guarded = ['id'];
}
