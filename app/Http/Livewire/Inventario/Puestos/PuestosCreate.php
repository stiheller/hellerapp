<?php

namespace App\Http\Livewire\Inventario\Puestos;

use App\Models\Inventario\Conmutador;
use Livewire\Component;

class PuestosCreate extends Component
{
    public $search;

    public function render()
    {
        $conmutadores = Conmutador::leftjoin('inv_racks','inv_conmutadores.rack_id','=','inv_racks.id')
                                    ->leftjoin('inv_sectores', 'inv_conmutadores.sector_id', '=', 'inv_sectores.id')
                                    ->select('inv_conmutadores.*','inv_sectores.nombre as nombre_sector',
                                    'inv_racks.nombre as nombre_rack')
                                    ->where('numero','LIKE', "%" .$this->search . "%")
                                    ->orwhere('serial','LIKE', "%" .$this->search . "%")
                                    ->orWhere('inv_sectores.nombre', 'LIKE', '%' . $this->search .'%')
                                    ->orWhere('inv_racks.nombre', 'LIKE', '%' . $this->search .'%') 
                                    ->get();

        return view('livewire.inventario.puestos.puestos-create', compact('conmutadores'));
    }
}
