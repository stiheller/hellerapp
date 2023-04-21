<?php

namespace App\Models\Homeintranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;
    protected $table = "calendario";
    protected $guarded = ['idAgenda'];
}
