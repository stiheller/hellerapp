<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerLicencias extends Model
{
    use HasFactory;
    protected $connection = 'personaldb';
    protected $table = 'per_licencias';
    protected $guarded = ['idLicencia'];
}
