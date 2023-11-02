@extends('layouts.app')
@section('cabecera')
{{$post->titulo}}    
@endsection

@section('content')

    <div class="container mx-auto md:flex">
        <div class="md:w-1/2 ml-10">
            <img src="{{asset('uploads/'. $post->imagen)}}" alt="Imagen del Post  {{$post->titulo}}">
            <div>
                @auth
                       @if ($post->user_id === auth()->user()->id)
                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                    @method('DELETE')    
                    @csrf
                    <input type="submit" value="Eliminar Publicación" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                </form>
                    @endif
                @endauth
            </div>
        </div>
        <div class="md:w-1/2 p-5 -mt-5 -mb-5">
            <div class="shadow bg-gradient-to-tr from-orange-300 to-pink-700  p-5 mb-5 rounded-xl">
                <div class="p-3">
                    <div class="border-b-[1px] border-slate-400">
                        <p class="-ml-2 mb-6 font-bold uppercase text-white flex col-span-3 mr-4">_{{$post->user->username}}</p>
                    </div>
                    
                    <div class="-ml-2  flex col-span-3 mt-5">
                        <p class="font-bold uppercase text-white flex col-span-3 mr-4">_{{$post->user->username}}</p>
                        <p class=" text-white flex col-span-3 lowercase">
                           {{$post->descripcion}}
                       </p>
                    </div>
                    <p class="-ml-2 mt-1 text-sm text-gray-300">
                        {{$post->created_at->diffForHumans()}}
                    </p>
                    {{-- <div class="flex justify-start space-x-5">
                        <p class="fill-white stroke-white font-bold text-2xl flex justify-start"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></p>
                        <p class="fill-white stroke-white font-bold text-2xl flex "><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376V479.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z"/></svg></p>               
                        <p class="fill-white stroke-white font-bold text-2xl flex "><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/></svg></p>               
                        
                    </div> --}}
                </div>

                <div class="bg-transparent p-6 mt-6">

                
                    <div class="bg-black bg-opacity-30 shadow mb-5 max-h-96 overflow-y-scroll -ml-[24px] -mt-[25px] -mr-[20px]">
                        @if ($post->comentarios->count())
                        <h2 class="ml-4 text-lg font-bold mb-4"> Comments ({{ $post->comentarios->count() }}) </h2> 
                        <div class="space-y-4">
                            @foreach ($post->comentarios as $comentario)
                            <div class=" bg-black bg-opacity-30 p-4 rounded-lg shadow-md">
                                <h3 class="text-lg font-bold">
                                    <a href="{{ route('posts.index', $comentario->user) }}" class="text-white font-bold hover:underline">
                                        {{ $comentario->user->username }}
                                    </a>
                                </h3>
                                <p class="text-gray-100 text-sm mb-2">{{ $comentario->created_at->diffForHumans() }}</p>
                                <p class="text-gray-100">{{ $comentario->comentario }}</p>
                            </div>
                            @endforeach
                        </div>
                        @else
                            <p class="p-10 text-center">No hay comentarios</p>
                        @endif
                    </div>
                    
            </div>
            @auth      
            @if(session('mensaje'))
            <p class="bg-green-500 text-white p-3 rounded-lg text-center font-bold uppercase mb-5">{{session('mensaje')}}</p>
         @endif

            <div class="mb-5">
                <label for="comentario" class="mb-2 block uppercase text-black font-bold">
                        <form action="{{route('comentarios.store', ['post'=>$post, 'user' =>$user])}}" method="POST">
                            @csrf
                        Agrega un comentario a la publicacion de {{$post->user->username}}
                    </label>
                    <textarea
                     id='comentario' name='comentario' placeholder="Agrega un comentario a la publicacion de {{$post->user->username}} "
                    class="border p-3 w-full rounded-lg  @error('comentario') border-red-500 "@enderror value="{{old('comentario')}}">
                    </textarea>
                    @error('comentario')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                        
                        @enderror
                </div>
                
            <input type="submit"
            value="Comentar"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
            @endauth
            </div>
        </div>
    </div>

@endsection