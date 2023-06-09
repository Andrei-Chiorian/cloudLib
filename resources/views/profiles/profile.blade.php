@extends('layouts.app')

@section('titulo')
    Editar perfil &#8226; {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex justify-center mt-10 md:gap-4 md:items-center ">
             
        <div class="md:w-4/12 bg-white  p-6 rounded-lg shadow-xl">
            <form action="{{ route('profile.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Introduce tu nombre" value="{{auth()->user()->name}}" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"/>
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="surname" class="mb-2 block uppercase text-gray-600 font-bold">Apellido</label>
                    <input type="text" id="surname" name="surname" placeholder="Introduce tu nombre" value="{{auth()->user()->surname}}" class="border p-3 w-full rounded-lg @error('surname') border-red-500 @enderror"/>
                    @error('surname')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>                
               
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">Nombre de Usuario</label>
                    <input type="text" id="username" name="username" placeholder="Introduce tu nombre de usuario" value="{{auth()->user()->username}}" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"/>
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5 text-gray-500">
                    <p>Puedes cambiar un nombre de usuario de CloudLib por otro que habías usado antes, a no ser que una nueva persona lo haya elegido.</p>
                </div>

                <div class="mb-5 ">
                    <label for="presentacion" class="mb-2 block uppercase text-gray-600 font-bold">Presentacion</label>
                    <textarea id="presentacion" name="presentacion" placeholder="Introduce tu presentacion" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">{{auth()->user()->desc}}</textarea>                    
                    @error('presentacion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Introduce tu email" value="{{auth()->user()->email}}" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"/>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>        

                <input type="submit" value="Guardar cambios" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                <a href="{{route('home')}}">                    
                    <button type="button" class="mt-2 bg-gradient-to-l from-gray-300 to-gray-400 hover:bg-gradient-to-l hover:from-gray-400 hover:to-gray-500 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">Cancelar</button>
                </a>
            </form>
        </div>
    </div>

@endsection