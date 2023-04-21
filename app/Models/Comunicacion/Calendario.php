<?php

namespace App\Models\Comunicacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "calendario";
    protected $guarded = ['id'];

}
