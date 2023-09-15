<?php

use App\Models\Admin\Log;

if (! function_exists('insert_log')) {
    function insert_log($usuario, $ip, $tabla_id, $accion_id)
    {
        $log = new Log;
        $log->user_id = $usuario;
        $log->ip = $ip;
        $log->table_id = $tabla_id;
        $log->log_accion_id = $accion_id;
        $log->save();
    }
}