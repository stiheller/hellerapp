<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\ImagenScanner;
use App\Models\Inventario\Scanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenScannerController extends Controller
{
    public function create(Scanner $scanner)
    {
        return view('inventario.scanners.createImagenes', compact('scanner'));
    }

    public function store(Request $request, Scanner $scanner)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/public/scanners');

        $imagenScanner = ImagenScanner::create([
            'url' => $imagenUrl,
            'scanner_id' => $scanner->id,
        ]);

        return redirect()->route('inventario.scanners.imagenes', $scanner)->with('info', 'imagen');
    }

    public function destroy(ImagenScanner $imagenScanner)
    {
        Storage::delete($imagenScanner->url);

        $scanner = Scanner::findOrFail($imagenScanner->scanner_id);

        $imagenScanner ->delete();

        return redirect()->route('inventario.scanners.imagenes', $scanner)->with('eliminar', 'ok');
    }
}
