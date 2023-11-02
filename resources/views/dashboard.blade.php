@extends('layouts.app')
@section('title')
    Perfil : {{$user->name}}
@endsection
@section('content')

<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-8/12 lg:w-6/12 px-5">
            <img src="{{asset('img/usuario.svg')}}" alt="Imagen Usuario">
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col text-center md:items-start md:justify-center py-10 md:py-10">
            <p class="text-white text-3xl">{{$user->name}}</p>
            <p class="text-gray-400 text-2xl mt-2">{{$user->username}}</p>

            <div class="flex flex-row md:-8/12 lg:w-6/12 pt-4 -ml-1">
                <p class="text-gray-800 text-lg font-bold  mr-3">
                    {{$user ->posts->count()}}
                    <span class="form-normal"> Posts</span>
                </p>
                <p class="text-gray-800 text-lg  font-bold mr-3 ">
                    0
                    <span class="form-normal"> Seguidores</span>
                </p>
                <p class="text-gray-800 text-lg  font-bold mr-3">
                    0
                    <span class="form-normal"> Siguiendo</span>
                </p>


            </div>
        </div>
    </div>
</div>


<section class="container mx-auto mt-10 ">
    <h2 class="text-4xl text-center font-black my-2">Publicaciones</h2>

    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-col-3 xl:grid-cols-4 gap-4">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route("posts.show", ["post" => $post, "user"=> $user])}}">
                    <img src="{{ asset("uploads/".$post->imagen) }}" alt="imagen {{ $post->titulo }}" class="rounded border border-white">
                </a>
            </div>
        @endforeach
    </div>
    
        <div class="my-10">
            {{ $posts->links() }}
        </div>
    @else
        <p class="dark:text-white uppercase text-sm text-center font-bold">No hay Publicaciones</p>
    @endif
    </section>    

@endsection