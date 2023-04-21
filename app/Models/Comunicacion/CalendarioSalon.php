<?php

namespace App\Models\Comunicacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioSalon extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "calendario_salones";
    protected $guarded = ['id'];
}
