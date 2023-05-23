<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\ImagenCpu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenCpuController extends Controller
{
    public function create($id)
    {
        return view('inventario.cpus.createImagenes', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/public/cpus');

        $imagenCpu = ImagenCpu::create([
            'url' => $imagenUrl,
            'cpu_id' => $id,
        ]);

        return redirect()->route('inventario.cpus.imagenes', $imagenCpu->cpu_id)->with('info', 'imagen');
    }

    public function destroy(ImagenCpu $imagenCpu)
    {
        Storage::delete($imagenCpu->url);

        $imagenCpu->delete();

        return redirect()->route('inventario.cpus.imagenes', $imagenCpu->cpu_id)->with('eliminar', 'ok');
    }
}
