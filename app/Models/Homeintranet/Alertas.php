<?php

namespace App\Models\Homeintranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alertas extends Model
{
    use HasFactory;

    protected $table = "homeintranet_alertas";
    protected $guarded = ['id'];
}
