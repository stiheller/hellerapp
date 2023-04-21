<?php

namespace App\Models\Comunicacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioEstado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "calendario_estados";
    protected $guarded = ['id'];
}
