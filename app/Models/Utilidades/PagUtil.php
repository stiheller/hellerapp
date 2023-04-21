<?php

namespace App\Models\Utilidades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagUtil extends Model
{
    use HasFactory;

    protected $table = "pagutiles";
    
    protected $guarded = ['id'];
}
