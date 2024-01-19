@extends('layouts.app')

@section('titulo')
    {{$user->name}}
@endsection

@section('contenido')
    <div class="flex justify-center">

        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            
            {{-- Imagen de perfil --}}

            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{$user->imagen ? asset('perfiles/' . $user->imagen) : asset('img/user-icon.svg')}}" alt="imagen usuario" class="rounded-full">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex items-center md:items-start flex-col md:justify-center py-10 md:py-10">
                
                {{-- Editar perfil --}}
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl"> {{$user->username}} </p>
                    @auth
                    @if (Auth()->user()->id === $user->id)
                    <a href="{{route('perfil.index')}}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </a>
                    @endif
                    @endauth
                </div>
                
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->followers()->count() }}
                    <span class="font-normal"> @choice('Seguidor|Seguidores', $user->followers()->count()) </span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followings()->count() }}
                    <span class="font-normal"> Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->posts->count()}}
                    <span class="font-normal"> Publicaciones</span>
                </p>

                @auth {{-- Botones para seguir y dejar de seguir --}}
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->siguiendo(auth()->user()))
                            <form action="{{route('users.follow', $user)}}" method="POST">
                                @csrf
                                <input
                                    type="submit" 
                                    class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 cursor-pointer"
                                    value="Seguir"
                                >
                            </form>
                        @else
                            <form action="{{route('users.unfollow', $user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input 
                                    type="submit" 
                                    class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400 cursor-pointer"
                                    value="Dejar de Seguir"
                                >
                            </form>
                        @endif

                    @endif
                @endauth

            </div>
        </div>
    </div>

    <section class="container mx-auto md:my-10">
        
        @if (session('success'))
        <div class="flex justify-center">
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3" role="alert">
                <div class="flex">
                  <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                  <div>
                    <p class="font-bold">Correcto!</p>
                    <p class="text-sm">{{session('success')}}</p>
                  </div>
                </div>
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="flex justify-center">
            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3" role="alert">
                <div class="flex">
                  <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                  <div>
                    <p class="font-bold">Error!</p>
                    <p class="text-sm">{{session('error')}}</p>
                  </div>
                </div>
            </div>
        </div>
        @endif
        
        <h2 class="text-3xl text-center font-black my-5 md:my-10">Publicaciones</h2>

        @if ($posts->count())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($posts as $post)
                    <a href="{{route('posts.show', ['post' => $post, 'user' => $user])}}">
                        <img class="h-auto max-w-full rounded-lg" src="{{asset('uploads'). '/' . $post->imagen}}" alt="{{$post->titulo}}">
                    </a>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones</p>
        @endif

    </section>
@endsection