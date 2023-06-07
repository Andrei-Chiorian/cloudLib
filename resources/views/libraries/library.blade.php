@extends('layouts.app')

@section('titulo')
    Crear biblioteca
@endsection

@section('contenido')
    <div class="md:flex justify-center mt-10 md:gap-4 md:items-center ">
             
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('library.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Introduce el nombre de tu biblioteca" value="{{old('name')}}" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"/>
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label for="desc" class="mb-2 block uppercase text-gray-600 font-bold">Descripcion</label>
                    <textarea id="desc" name="desc" placeholder="Introduce una descripcion" class="overflow-auto scrollbar-hide border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">{{old('desc')}}</textarea>                    
                    @error('desc')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>  

                <div class="mb-5">
                    <label for="start_date" class="mb-2 block uppercase text-gray-600 font-bold">Fecha de inicio de la biblioteca fisica</label>
                    <input type="date" id="start_date" name="start_date" value="{{old('start_date')}}" class="border p-3 w-full rounded-lg @error('start_date') border-red-500 @enderror"/>
                    @error('start_date')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5 text-gray-500">
                    <p>Introduce la fecha en la que comenzaste tu biblioteca fisica.</p>
                </div>
               
                <div class="mb-5">
                    <div for="state" class="mb-2 block uppercase text-gray-600 font-bold">Visibilidad</div>                    
                    <input type="radio" id="On" name="state" value="on" class="@error('state') border-red-500 @enderror"/>
                    <label for="On">On</label>
                    <input type="radio" id="Off" name="state" value="off" class="ml-2 @error('state') border-red-500 @enderror" checked />
                    <label for="Off">Off</label>
                    @error('state')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5 text-gray-500">
                    <p>Puedes cambiar la visibilidad para que otros usuarios puedan ver y valorar tu biblioteca.</p>
                </div>

                                            

                <input type="submit" value="Añadir bilbioteca" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

@endsection