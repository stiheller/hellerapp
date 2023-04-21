<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Impresion extends Model
{
    use HasFactory;
    protected $table = "impresiones";
    protected $guarded = ['id'];
}
