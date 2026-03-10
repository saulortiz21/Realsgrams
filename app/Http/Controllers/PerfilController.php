<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PerfilController extends Controller

{
    public function index()
    {
        return view('perfil.index');
    }

public function store(Request $request)
{
    $request->request->add(['username' => Str::slug($request->username)]);

    $request->validate([
        'username' => ['required', 'max:255', 'unique:users,username,' . Auth::user()->id, 'not_in:twitter,editar-perfil'],
    ]);

    $usuario = User::find(Auth::user()->id);
    $usuario->username = $request->username;

    if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
        $imagen = $request->file('imagen');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $manager = new ImageManager(new Driver());
        $image = $manager->read($imagen);
        $image->cover(1000, 1000);
        $image->save(public_path('perfiles/' . $nombreImagen));

        $usuario->imagen = $nombreImagen;
    }

    $usuario->save();

    return redirect()->route('posts.index', $usuario->username);
}
}
