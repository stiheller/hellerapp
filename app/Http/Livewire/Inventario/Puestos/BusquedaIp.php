<?php

namespace App\Http\Livewire\Inventario\Puestos;

use App\Models\Inventario\Ip;
use Livewire\Component;

class BusquedaIp extends Component
{
    public $search;

    public function render()
    {
        $ips = Ip::leftjoin('inv_conexiones', 'inv_ips.id', '=', 'inv_conexiones.ip_id')
                    ->leftjoin('inv_puestos', 'inv_conexiones.id', '=', 'inv_puestos.conexion_id')
                    ->select('inv_ips.*','inv_puestos.nombre as nombre_puesto')
                    ->where('direccion_ip','LIKE', "%" .$this->search . "%")
                    ->get();

        return view('livewire.inventario.puestos.busqueda-ip', compact('ips'));
    }
}
