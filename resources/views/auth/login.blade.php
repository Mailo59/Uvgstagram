@extends('layouts.app')
@section('cabecera')
    Login   
@endsection
@section('title')
<div class="w-full h-full flex justify-center items-center">
    <h1 id="typewriter" class="text-white text-6xl font-bold"></h1>
</div>
 @endsection
 
    @section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
      <div class="md:w-4/12 p-5">
          <img src="{{asset('img/portada.png')}}" alt="Imagen Registro de Usuarios">
      </div>
  
      <div class="md:w-4/12 border-solid border-2 bg-gradient-to-tr from-orange-300 to-pink-700 border-white p-6 rounded-lg shadow-lg">
          <form method="POST" action="{{ route('login') }}"> 
              @csrf

               @if(session('status'))
                  <p class="bg-red-500 text-white p-3 rounded-lg text-center mb-5">{{session('status')}}</p>
               @endif

              <div class="mb-5">
                  <label for="email" class="mb-2 block uppercase text-gray-700 font-bold ">
                      Email
                  </label>
                  <input type="email" id="email" name="email" placeholder="Tu Email"
                  class="border p-3 w-full rounded-lg  @error("email") border-red-500 "@enderror value="{{old("email")}}">
                  @error("email")
                  <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                        
                 @enderror
              </div>
  
              <div class="mb-5">
                  <label for="password" class="mb-2 block uppercase text-gray-700 font-bold">
                      Password
                  </label>
                  <input type="password" id="password" name="password" placeholder="Tu Password"
                  class="border p-3 w-full rounded-lg  @error("password") border-red-500 "@enderror value="{{old("password")}}">
                  @error("password")
                      <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                        
                      @enderror
              </div>
  
              <input type="submit"
              value="Iniciar Sesión"
              class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
  
          </form>
          <div class="mt-4">
            <a id="registertxt" class="underline decoration-slate-500 font-bold uppercase text-gray-600" href="{{ route('register')}}">Crear Cuenta</a>
          </div>
         
      </div>
    @endsection
    