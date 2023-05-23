<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\ImagenPuesto;
use App\Models\Inventario\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenPuestoController extends Controller
{
    public function create(Puesto $puesto)
    {
        return view('inventario.puestos.createImagenes', compact('puesto'));
    }

    public function store(Request $request, Puesto $puesto)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/public/puestos');

        $imagenPuesto = ImagenPuesto::create([
            'url' => $imagenUrl,
            'puesto_id' => $puesto->id,
        ]);

        return redirect()->route('inventario.puestos.imagenes', $puesto)->with('info', 'imagen');
    }

    public function destroy(ImagenPuesto $imagenPuesto)
    {
        Storage::delete($imagenPuesto->url);

        $puesto = Puesto::findOrFail($imagenPuesto->puesto_id);

        $imagenPuesto->delete();

        return redirect()->route('inventario.puestos.imagenes', $puesto)->with('eliminar', 'ok');
    }

}
