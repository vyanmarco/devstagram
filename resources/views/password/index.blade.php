@extends('layouts.app')

@section('titulo')
    Cambiar contraseña
@endsection

@section('contenido')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <!-- component eye-->
@endpush

<div class="md:w-12/12 flex justify-center">
    <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl flex justify-center">

        <form action="{{route('password.store')}}" method="POST" class="md:w-6/12">
            @csrf
            
            {{-- Sesion de Error --}}
            @if (session('error'))
                <div class="md:w-full mb-5">
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

            {{-- Validar password --}}
            <div class="py-2" x-data="{ show: true }">
                <label for="validate_password" class="text-gray-500 uppercase font-bold">Contraseña Actual</label>
                <div class="relative">
                    <input placeholder="" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full 
                    bg-white border placeholder-gray-600
                    focus:placeholder-gray-500
                    focus:bg-white 
                    focus:border-gray-600  
                    focus:outline-none @error('validate_password') border-red-500 @enderror" name="validate_password" id="validate_password">

                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                            </svg>
                    
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 640 512">
                            <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                            </svg>
                
                    </div>
                </div>
                    @error('validate_password')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
            </div>


            {{-- Nueva password --}}
            <div class="py-2" x-data="{ show: true }">
                <label for="password" class="text-gray-500 uppercase font-bold">Nueva Contraseña</label>
                <div class="relative">
                    <input placeholder="" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full 
                    bg-white border placeholder-gray-600
                    focus:placeholder-gray-500
                    focus:bg-white 
                    focus:border-gray-600  
                    focus:outline-none @error('password') border-red-500 @enderror" name="password" id="password">

                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                            </svg>
                    
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 640 512">
                            <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                            </svg>
                
                    </div>
                </div>
                    @error('password')
                        <p class="bg-red-500 text-white font-bold text-sm rounded-lg p-3 my-2"> {{$message}} </p>
                    @enderror
            </div>
            
            {{-- Repetir password --}}
            <div class="py-2" x-data="{ show: true }">
                <label for="password_confirmation" class="text-gray-500 uppercase font-bold">Repetir Contraseña</label>
                <div class="relative">
                    <input placeholder="" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full 
                    bg-white border placeholder-gray-600
                    focus:placeholder-gray-500
                    focus:bg-white 
                    focus:border-gray-600  
                    focus:outline-none" name="password_confirmation" id="password_confirmation">

                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                            </svg>
                    
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 640 512">
                            <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                            </svg>
                
                    </div>
                </div>
            </div>
            
            <input type="submit" value="Cambiar contraseña" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg shadow my-5">
        </form>
    </div>
</div>

{{-- 
<div class="py-2" x-data="{ show: true }">
    <span class="px-1 text-sm text-gray-600">Password</span>
    <div class="relative">
      <input placeholder="" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full 
    bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
    focus:placeholder-gray-500
    focus:bg-white 
    focus:border-gray-600  
    focus:outline-none">
      <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
          :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
          viewbox="0 0 576 512">
          <path fill="currentColor"
            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
          </path>
        </svg>

        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
          :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
          viewbox="0 0 640 512">
          <path fill="currentColor"
            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
          </path>
        </svg>

      </div>
    </div>
</div> --}}

@endsection