@extends('layouts.app')

@section('titulo')
    Editar Perfil - {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de Usuario</label>
                    <input id="username" name="username" value="{{auth()->user()->username}}" type="text" placeholder="{{auth()->user()->username}}" class="border p-3 w-full rounded-lg @error('username')
                        border-red-500
                    @enderror">
                    @error('username')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
                </div>

                {{-- <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de Perfil</label>
                    <input id="imagen" name="imagen" type="file" class="border p-3 w-full rounded-lg" accept=".jpg, .jpeg, .png">
                </div> --}}
                
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Cambiar Imagen De Perfil</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="imagen">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG o GIF (MAX. 500x500px).</p>


                <div class="flex justify-center">
                    <a href="{{route('password.index')}}">
                        <div class="bg-transparent hover:bg-sky-600 text-sky-600 font-semibold hover:text-white py-2 px-4 border border-sky-500 hover:border-transparent rounded my-5 flex gap-1">
                            Cambiar Contraseña
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                    </a>
                </div>


                <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg shadow">

            </form>
        </div>

    </div>
@endsection