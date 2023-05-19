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

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function render()
    {
        $puestos = Puesto::leftjoin('inv_conexiones','inv_puestos.conexion_id','=','inv_conexiones.id')
                    /* ->leftjoin('sectores','puestos.sector_id','=','sectores.id')
                    ->leftjoin('ips','conexiones.ip_id','=','ips.id')
                    ->leftjoin('conmutadores','conexiones.conmutador_id','=','conmutadores.id')
                    ->leftjoin('racks','conmutadores.rack_id','=','racks.id') */
                    /* ->leftjoin('sectores','conmutadores.sector_id','=','sectores.id') */
                    ->select('inv_puestos.*','inv_conexiones.boca_patch as boca_patch',
                    'inv_conexiones.boca_switch as boca_switch','inv_conexiones.conectada_rack as conectada_rack',
                    'inv_conexiones.en_uso as en_uso','inv_conexiones.ip_id as ip_id'
                    /* 'sectores.nombre as nombre_sector','sectores.planta as planta_sector',
                    'ips.direccion_ip as direccion_ip','ips.estado as estado_ip',
                    'conmutadores.numero as numero_conmutador','conmutadores.marca as marca_conmutador',
                    'racks.nombre as nombre_rack' */)
                    ->where('inv_puestos.id', 'LIKE', "%". $this->search . "%")
                    ->orwhere('inv_puestos.nombre', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('inv_puestos.descripcion', 'LIKE', "%" . $this->search . "%")
                    ->orderby($this->sort, $this->direction)
                    ->paginate($this->cant);


        /* $puestos = Puesto::where('id', 'LIKE', "%" . $this->search . "%")
            ->orWhere('nombre', 'LIKE', "%" . $this->search . "%")
            ->orWhere('descripcion', 'LIKE', "%" . $this->search . "%")
            ->orderby($this->sort, $this->direction)
            ->paginate($this->cant); */

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
