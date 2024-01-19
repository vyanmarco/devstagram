@extends('layouts.app')

@section('titulo')
    Regístrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/register.jpg')}}" class="rounded-lg" alt="imagen de fondo">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input id="name" name="name" value="{{old('name')}}" type="text" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg @error('name')
                        border-red-500
                    @enderror">
                    @error('name')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username" name="username" value="{{old('username')}}" type="text" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg @error('username')
                        border-red-500
                    @enderror">
                    @error('username')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" type="email" value="{{old('email')}}" placeholder="Email de Registro" class="border p-3 w-full rounded-lg @error('email')
                    border-red-500
                    @enderror">
                    @error('email')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Contraseña de Registro" class="border p-3 w-full rounded-lg @error('password')
                    border-red-500
                    @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite la contraseña" class="border p-3 w-full rounded-lg">
                </div>
                
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg shadow">

            </form>

            <div class="mt-5 text-center">
                <a href="{{route('login')}}" class="font-bold text-sky-600">Iniciar Sesión</a>
            </div>

        </div>

    </div>
    
@endsection