<?php

namespace App\Http\Livewire\Insumos;

use Livewire\Component;
use App\Models\Insumos\Insumo;

class Searchboxinsumo extends Component
{
    public $buscar;
    public $insumos;
    public $picked;

    public function mount()
    {
        $this->buscar = "";
        $this->insumos = [];
        $this->picked = false;
    }

    public function updatedBuscar()
    {
        $this->picked = false;

        $this->validate([
            "buscar" => "required|min:2",

        ]);

        $this->insumos = Insumo::where("nombre", "like", trim($this->buscar) . "%")
                                ->orWhere('codigo_sss', "=", trim($this->buscar))
                                ->orderBy('nombre', 'ASC')
                                ->get();

    }

    public function asignarInsumo($nombre)
    {
        $this->buscar = $nombre;
        $this->picked = true;
    }

    public function asignarPrimero()
    {
        $insumos = Insumo::where("nombre", "like", trim($this->buscar) . "%")
                            ->orWhere('codigo_sss', "=", trim($this->buscar))
                            ->first();
        if($insumos)
        {
            $this->buscar = $insumos->id."|".$insumos->codigo_sss."|".$insumos->nombre;
        }
        else
        {
            $this->buscar = "...";
        }
        $this->picked = true;
    }
    public function render()
    {
        return view('livewire.insumos.searchboxinsumo');
    }
}
