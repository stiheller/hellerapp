<?php

namespace App\Http\Livewire\Inventario;

use App\Models\Inventario\Impresora;
use Livewire\Component;
use Livewire\WithPagination;

class ImpresorasIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 5;
    public $filtro = 9;
    public $open_busqueda = true;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function updatingFiltro(){
        $this->resetPage();
    }

    public function render()
    {
        if ($this->filtro == 9) {
            $impresoras = Impresora::leftjoin('inv_puestos','inv_impresoras.equipamiento_id','=','inv_puestos.equipamiento_id')
                                    ->select('inv_impresoras.*','inv_puestos.nombre as nombre_puesto')
                                    ->where('inv_impresoras.id', 'LIKE', "%" . $this->search . "%")
                                    ->orWhere('inv_impresoras.nombre', 'LIKE', "%" . $this->search . "%")
                                    ->orWhere('modelo', 'LIKE', "%" . $this->search . "%")
                                    ->orWhere('serial', 'LIKE', "%" . $this->search . "%")
                                    ->orWhere('inv_puestos.nombre', 'LIKE', "%" . $this->search . "%")
                                    ->orderby($this->sort, $this->direction)
                                    ->paginate($this->cant);

            $this->open_busqueda = true;

        } else {
            $impresoras = Impresora::leftjoin('inv_puestos','inv_impresoras.equipamiento_id','=','inv_puestos.equipamiento_id')
                                    ->select('inv_impresoras.*','inv_puestos.nombre as nombre_puesto')
                                    ->where('inv_impresoras.estado', $this->filtro)
                                    ->orderby($this->sort, $this->direction)
                                    ->paginate($this->cant);

            $this->open_busqueda = false;
        }

        return view('livewire.inventario.impresoras-index', compact('impresoras'));
    }

    //Ordena según parámetro.
    public function order($orden)
    {
        if ($this->sort == $orden) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $orden;
        }
        $this->sort = $orden;
    }
}
