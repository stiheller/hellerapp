<?php

namespace App\Http\Livewire\Inventario;

use App\Models\Inventario\Monitor;
use Livewire\Component;
use Livewire\WithPagination;

class MonitoresIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 5;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function render()
    {
        /* $monitores = Monitor::leftjoin('puestos','monitores.equipamiento_id','=','puestos.equipamiento_id')
            ->select('monitores.*','puestos.nombre as nombre_puesto')
            ->where('monitores.id', 'LIKE', '%' . $this->search . '%')
            ->orWhere('marca', 'LIKE', '%' . $this->search . '%')
            ->orWhere('tamanio', 'LIKE', '%' . $this->search . '%')
            ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('serial', 'LIKE', '%' . $this->search . '%')
            ->orWhere('puestos.nombre','LIKE','%' . $this->search . '%')
            ->orderby($this->sort, $this->direction)
            ->paginate($this->cant); */

        $monitores = Monitor::where('id', 'LIKE', '%' . $this->search . '%')
            ->orWhere('marca', 'LIKE', '%' . $this->search . '%')
            ->orWhere('tamanio', 'LIKE', '%' . $this->search . '%')
            ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('serial', 'LIKE', '%' . $this->search . '%')
            ->orderby($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.inventario.monitores-index', compact('monitores'));
    }
}
