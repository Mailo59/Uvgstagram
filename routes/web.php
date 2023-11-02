<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PrincipalController;

// Ruta para el formulario de inicio de sesión
Route::get('/', [PrincipalController::class, 'index'])->name('principal');
// Ruta para el formulario de registro
Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Ruta para el proceso de registro
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// Ruta para el formulario de inicio de sesión
Route::get("/login", [LoginController::class, "index"])->name("login");
// Ruta para el proceso de inicio de sesión
Route::post('/login', [LoginController::class, 'store'])->name('login');
// Ruta para cerrar sesión
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
// Ruteo por Route Model Binding
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
// Ruteo para crear un post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

//Ruteo para guardar un post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

//Ruteo para subir un Imagenes
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//Rute para mostrar post
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Ruteo para agregar comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

//Ruteo para borrar comentarios
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

