<?php

namespace App\Models\Homeintranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;
    protected $table = "novedades";
    protected $guarded = ['id'];
}
