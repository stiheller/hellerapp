<?php

use App\Models\Insumos\Insumo;

if (! function_exists('get_insumo')) {
    function get_insumo($insumo_id)
    {
        $insumo = Insumo::where('id', '=', $insumo_id)->get();
        return $insumo;
    }
}