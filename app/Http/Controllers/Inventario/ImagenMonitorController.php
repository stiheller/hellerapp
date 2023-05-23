<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\ImagenMonitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenMonitorController extends Controller
{
    public function create($id)
    {
        return view('inventario.monitores.createImagenes', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/public/monitores');

        $imagenMonitor = ImagenMonitor::create([
            'url' => $imagenUrl,
            'monitor_id' => $id,
        ]);

        return redirect()->route('inventario.monitores.imagenes', $imagenMonitor->monitor_id)->with('info', 'imagen');
    }

    public function destroy(ImagenMonitor $imagenMonitor)
    {
        Storage::delete($imagenMonitor->url);

        $imagenMonitor->delete();

        return redirect()->route('inventario.monitores.imagenes', $imagenMonitor->monitor_id)->with('eliminar', 'ok');
    }
}
