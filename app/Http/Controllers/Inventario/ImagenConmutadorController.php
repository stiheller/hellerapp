<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\ImagenConmutador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenConmutadorController extends Controller
{
    public function create($id)
    {
        return view('inventario.conmutadores.createImagenes', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/public/conmutadores');

        $imagenConmutador = ImagenConmutador::create([
            'url' => $imagenUrl,
            'conmutador_id' => $id,
        ]);

        return redirect()->route('inventario.conmutadores.imagenes', $imagenConmutador->conmutador_id)->with('info', 'imagen');
    }

    public function destroy(ImagenConmutador $imagenConmutador)
    {
        Storage::delete($imagenConmutador->url);

        $imagenConmutador->delete();

        return redirect()->route('inventario.conmutadores.imagenes', $imagenConmutador->conmutador_id)->with('eliminar', 'ok');
    }
}
