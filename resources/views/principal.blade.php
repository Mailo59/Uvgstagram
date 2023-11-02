@extends('layouts.app')
 
@section('content')
<div class="bg-black flex space-x-12 p-12 justify-center items-center">
    @foreach ($posts as $post)
<!-- ✅ Grid Section - Starts Here 👇 -->
<section id="Projects"
    class="w-full mx-auto grid grid-cols-1  gap-y-10 justify-items-center justify-center mt-10 mb-5">

        <!-- ✅ Product card - Starts Here 👇 -->
        <div class="w-1/3 h-3/4 border-b-[0.1px] border-gray-300 shadow-md mb-48">
            <div class="container flex col-span-2">
                <h2 class="text-lg font-sans mb-2  text-white ml-4 flex col-span-2">_{{$post->user->username}} •</h2>
                <h3 class="ml-3 mt-[2px] flex col-span-2 text-slate-400">{{$post->created_at->diffForHumans()}}</h3>
                <p class="flex ml-64 text-2xl hover:rounded-full h-8  hover:bg-slate-400 hover:opacity-30" ><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"/></svg></p>
            </div>
                <div class="container border-gray-300 border-[0.1px]  duration-500 transform hover:scale-95 hover:shadow-xl px-6 mb-3">
                    
            <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen {{ $post->titulo }}"
                    class="w-full h-full object-cover ">
            </a>
                </div>
                <div class="ml-3 flex col-span-3 space-x-5">
                    <p class="stroke-white fill-white text-2xl flex gap-1 "><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></p>
                    <p class="stroke-white fill-white text-2xl flex gap-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376V479.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z"/></svg></p>               
                    <p class=" stroke-white fill-white text-2xl gap-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/></svg></p>               
                    
                </div>
                <div class="p-4 mb-4">
                    <h2 class="-ml-3 font-bold font-sans mb-2 uppercase   text-white flex col-span-2 mr-3">7958 Me gusta</h2>
                    <div class="flex col-span-2 -ml-3">
                        <h2 class=" font-bold font-sans mb-2 uppercase   text-white flex col-span-2 mr-3">_{{$post->user->username}}  </h2>
                                        <!-- Descripción del post -->
                <p class="mb-4  text-slate-300 flex col-span-2">{{ $post->descripcion }}</p>
                    </div>

                <!-- Enlace para ver la publicación -->
                <a class="text-white" href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}"
                    class="text-gray-300 hover:underline">Ver un comentario</a>
                <!-- Aquí puedes mostrar los comentarios y otros detalles -->
            </div>
        </div>
        <!-- 🛑 Product card - Ends Here  -->
    @endforeach
</section>
<!-- ✅ Grid Section - Ends Here 👆 -->
</div>
@endsection
