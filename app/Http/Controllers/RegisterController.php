<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class   RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->request->add([
            'username' => (Str::slug($request->username)) 
        ]);

        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:30'],
            'username' => ['required', 'max:30', 'unique:users,username'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);
        
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => (strtolower($request->email)),
            'password' => bcrypt($request->password)

        ]);

        //Opción 1 para autenticar al usuario
        auth()->attempt([
            'email'=> $request->email,
            'password' => $request->password
            
        ]);
        return redirect()->route('posts.index', auth()->user()->username);
      }
}   