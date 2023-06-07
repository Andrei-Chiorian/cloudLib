@extends('layouts.app')

@section('titulo')
    Añadir Prestamo &#8226; {{$book->name}} &#8226; CloudLib
@endsection

@section('contenido')
    <div class="md:flex justify-center mt-10 md:gap-4 md:items-center ">
             
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('loan.store') }}" method="POST" novalidate>
                @csrf                
                <div class="mb-5">
                    <label for="libro" class="mb-2 block uppercase text-gray-600 font-bold">Libro</label>
                    <input type="text" id="libro" name="libro" value="{{$book->name}}" class="border p-3 w-full rounded-lg @error('libro') border-red-500 @enderror" disabled/>
                    @error('libro')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label for="person" class="mb-2 block uppercase text-gray-600 font-bold">Persona</label>
                    <input id="person" name="person" placeholder="Prestatario" value="{{old('person')}}" class="border p-3 w-full rounded-lg @error('person') border-red-500 @enderror"/>                    
                    @error('person')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>  

                <div class="mb-5">
                    <label for="checkout" class="mb-2 block uppercase text-gray-600 font-bold">Fecha del prestamo</label>
                    <input type="date" id="checkout" name="checkout" value="{{old('checkout')}}" class="border p-3 w-full rounded-lg @error('checkout') border-red-500 @enderror"/>
                    @error('checkout')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="checkinPrev" class="mb-2 block uppercase text-gray-600 font-bold">Fecha prevista de devolucion</label>
                    <input type="date" id="checkinPrev" name="checkinPrev" value="{{old('checkinPrev')}}" class="border p-3 w-full rounded-lg @error('checkinPrev') border-red-500 @enderror"/>
                    @error('checkinPrev')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="obser" class="mb-2 block uppercase text-gray-600 font-bold">Observaciones</label>
                    <textarea type="date" id="obser" name="obser" class="overflow-auto scrollbar-hide border p-3 w-full rounded-lg @error('obser') border-red-500 @enderror" placeholder="Alguna observacion sobre el libro como daños etc...">{{old('obser')}}</textarea>
                    @error('obser')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>                                              
                <input type="hidden" name="book_id" value="{{$book->id}}">
                <input type="submit" value="Crear Prestamo" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

@endsection