<?php

namespace App\Models\Homeintranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoClick extends Model
{
    use HasFactory;
    protected $table = "homeintraet_seguimiento";
    protected $guarded = ['id'];
}
