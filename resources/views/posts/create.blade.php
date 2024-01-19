@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" method="POST" id="dropzone" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
            
            <form action="{{route('posts.store')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input id="titulo" name="titulo" value="{{old('titulo')}}" type="text" placeholder="Titulo de la publicación" class="border p-3 w-full rounded-lg @error('titulo')
                        border-red-500
                    @enderror">
                    @error('titulo')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación" class="border p-3 w-full rounded-lg @error('descripcion')
                        border-red-500
                    @enderror">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}">
                    @error('imagen')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
                </div>

                <input type="submit" value="Publicar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg shadow">

            </form>

        </div>
        
    </div>
@endsection