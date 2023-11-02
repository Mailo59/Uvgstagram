<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PrincipalController extends Controller
{
    public function index(){
        // Obtén todos los posts de los usuarios registrados
        $posts = Post::with('user')->latest()->get();

        return view('principal', compact('posts'));

    }


}
