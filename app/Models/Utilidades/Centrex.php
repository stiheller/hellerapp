<?php

namespace App\Models\Utilidades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centrex extends Model
{
    use HasFactory;

    protected $table = "centrex";
    
    protected $guarded = ['id'];
}
