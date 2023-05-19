<?php

namespace App\Http\Livewire\Inventario;

use App\Models\Inventario\Scanner;
use Livewire\Component;
use Livewire\WithPagination;

class ScannersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 5;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function render()
    {
        $scanners = Scanner::leftjoin('inv_puestos','inv_scanners.equipamiento_id','=','inv_puestos.equipamiento_id')
                    ->select('inv_scanners.*','inv_puestos.nombre as nombre_puesto')
                    ->where('inv_scanners.id', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('inv_scanners.nombre', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('modelo', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('serial', 'LIKE', "%" . $this->search . "%")
                    ->orderby($this->sort, $this->direction)
                    ->paginate($this->cant);
        return view('livewire.inventario.scanners-index', compact('scanners'));

        /* return view('livewire.inventario.scanner-index'); */
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
