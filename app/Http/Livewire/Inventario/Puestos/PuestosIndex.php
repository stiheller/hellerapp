<?php

namespace App\Http\Livewire\Inventario\Puestos;

use App\Models\Inventario\Puesto;
use Livewire\Component;
use Livewire\WithPagination;

class PuestosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 5;
    public $filtro = 2;
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
        if ($this->filtro == 2) {
            $puestos = Puesto::leftjoin('inv_conexiones','inv_puestos.conexion_id','=','inv_conexiones.id')
                                    ->select('inv_puestos.*','inv_conexiones.boca_patch as boca_patch',
                                    'inv_conexiones.boca_switch as boca_switch','inv_conexiones.conectada_rack as conectada_rack',
                                    'inv_conexiones.en_uso as en_uso','inv_conexiones.ip_id as ip_id')
                                    ->where('inv_puestos.nombre', 'LIKE', "%" . $this->search . "%")
                                    ->orWhere('inv_puestos.descripcion', 'LIKE', "%" . $this->search . "%")
                                    ->orderby($this->sort, $this->direction)
                                    ->paginate($this->cant);
            $this->open_busqueda = true;
        } else {
            $puestos = Puesto::leftjoin('inv_conexiones','inv_puestos.conexion_id','=','inv_conexiones.id')
                                    ->select('inv_puestos.*','inv_conexiones.boca_patch as boca_patch',
                                    'inv_conexiones.boca_switch as boca_switch','inv_conexiones.conectada_rack as conectada_rack',
                                    'inv_conexiones.en_uso as en_uso','inv_conexiones.ip_id as ip_id')
                                    ->where('inv_puestos.estado', $this->filtro)
                                    ->orderby($this->sort, $this->direction)
                                    ->paginate($this->cant);
            $this->open_busqueda = false;
        }

        return view('livewire.inventario.puestos.puestos-index', compact('puestos'));
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
