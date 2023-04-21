<?php

namespace App\Models\Utilidades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interno extends Model
{
    use HasFactory;
    protected $table = "internos";
    
    protected $guarded = ['id'];
}
