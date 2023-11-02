<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    //

    public function store(Request $request, User $user, Post $post)
    {

        //Validar
        $this->validate($request, [
            'comentario' => 'required|max:255',

            
        ]);

        //Crear
        Comentario::create([
        "comentario" => $request->comentario,
        "user_id" => auth()->user()->id,
        "post_id" => $post->id
        ]);

        //Retornar
        return back()->with("mensaje", "Comentario Agregado Correctamente");
    }
}
