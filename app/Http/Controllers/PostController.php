<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    // Método para mostrar el dashboard solamente para usuarios logeados
    public function __construct()
    {
        $this->middleware(['auth'])->except('show','index');
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(4); // Agregué la consulta usando el modelo Post

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validar los datos que no estén vacíos el título y la descripción
        $this->validate($request, [
            'titulo' => 'required|max:255', // Corregí la coma que estaba fuera de lugar
            'descripcion' => 'required|max:255'
        ]);
        
        // Guardar el post en la base de datos
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
        ]);    
            
        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show',
        [
            'user' => $user,
            'post' => $post,
        ]
    );
    }

    public function destroy(Post $post){
        //AUTORIZAR
        $this->authorize('delete',$post);
        
        //ELIMINAR
        $post->delete();
        $image_path = public_path('uploads/' .$post->imagen);
        if(File::exists($image_path)){
            unlink($image_path);
        }
        //REDIRECCIONAR
        return redirect()->route('posts.index',auth()->user()->username);
    }
}
