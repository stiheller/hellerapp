<?php

namespace App\Http\Livewire\Inventario;

use App\Models\Inventario\Puesto;
use Livewire\Component;
use Livewire\WithPagination;

class PrincipalIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 6;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function render()
    {

        $puestos = Puesto::leftjoin('inv_conexiones','inv_puestos.conexion_id','=','inv_conexiones.id')
                    ->leftjoin('inv_sectores','inv_puestos.sector_id','=','inv_sectores.id')
                    ->leftjoin('inv_ips','inv_conexiones.ip_id','=','inv_ips.id')
                    ->leftjoin('inv_conmutadores','inv_conexiones.conmutador_id','=','inv_conmutadores.id')
                    ->leftjoin('inv_racks','inv_conmutadores.rack_id','=','inv_racks.id')
                    /* ->leftjoin('sectores','conmutadores.sector_id','=','sectores.id') */
                    ->select('inv_puestos.*','inv_conexiones.boca_patch as boca_patch',
                    'inv_conexiones.boca_switch as boca_switch','inv_conexiones.conectada_rack as conectada_rack',
                    'inv_sectores.nombre as nombre_sector','inv_sectores.planta as planta_sector',
                    'inv_ips.direccion_ip as direccion_ip','inv_ips.estado as estado_ip',
                    'inv_conmutadores.numero as numero_conmutador','inv_conmutadores.marca as marca_conmutador',
                    'inv_racks.nombre as nombre_rack')
                    ->where('inv_puestos.nombre', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('inv_ips.direccion_ip', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('inv_sectores.nombre', 'LIKE', "%" . $this->search . "%")
                    ->orderby($this->sort, $this->direction)
                    ->paginate($this->cant);

        return view('livewire.inventario.principal-index', compact('puestos'));
        /* return view('livewire.inventario.principal-index'); */
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
