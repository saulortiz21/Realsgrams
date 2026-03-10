<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . '.' . $imagen->extension();

        // Crear manager con driver GD
        $manager = new ImageManager(new Driver());

        // Leer imagen
        $image = $manager->read($imagen);

        // Redimensionar (ejemplo)
        $image->cover(1000, 1000);

        // Guardar
        $image->save(public_path('uploads/' . $nombreImagen));
       

        return response()->json(['imagen' => $nombreImagen]);
    }
}