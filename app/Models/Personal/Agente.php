<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    use HasFactory;
    protected $connection = 'personaldb';
    protected $table = 'per_agentes';
    protected $guarded = ['idAgente'];



}
