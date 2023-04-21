<?php

namespace App\Models\Intranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $connection = 'intranet';
    protected $table = 'usuarios';
    protected $guarded = ['idAgente'];
}
