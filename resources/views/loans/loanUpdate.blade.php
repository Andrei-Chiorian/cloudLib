@extends('layouts.app')

@section('titulo')
    Prestamo &#8226; {{$book}} &#8226; CloudLib
@endsection

@section('contenido')
    <div class="md:flex justify-center mt-10 md:gap-4 md:items-center ">
             
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form id="form" action="{{ route('loan.update') }}" method="POST" novalidate>
                @csrf                
                <div class="mb-5">
                    <label for="book" class="mb-2 block uppercase text-gray-600 font-bold">Libro</label>
                    <input id="book" name="book" value="{{$book}}" class="border p-3 w-full rounded-lg @error('book') border-red-500 @enderror" disabled/>
                    @error('book')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="library" class="mb-2 block uppercase text-gray-600 font-bold">Biblioteca</label>
                    <input id="library" name="library" value="{{$library}}" class="border p-3 w-full rounded-lg @error('libro') border-red-500 @enderror" disabled/>
                    @error('libro')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label for="person" class="mb-2 block uppercase text-gray-600 font-bold">Persona</label>
                    <input id="person" name="person" value="{{$loan->person}}" class="border p-3 w-full rounded-lg @error('person') border-red-500 @enderror" disabled/>                    
                    @error('person')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>  

                <div class="mb-5">
                    <label for="checkout" class="mb-2 block uppercase text-gray-600 font-bold">Fecha del prestamo</label>
                    <input type="date" id="checkout" name="checkout" value="{{$loan->checkout}}" class="disabled:bg-gray-50 disabled:border-gray-200 border p-3 w-full rounded-lg @error('checkout') border-red-500 @enderror"/ disabled>
                    @error('checkout')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="checkinPrev" class="mb-2 block uppercase text-gray-600 font-bold">Fecha prevista de devolucion</label>
                    <input type="date" id="checkinPrev" name="checkinPrev" value="{{$loan->checkinPrev}}" class=" @if($loan->checkin != null) disabled:bg-gray-50 disabled:border-gray-200 @endif border p-3 w-full rounded-lg @error('checkinPrev') border-red-500 @enderror" @if($loan->checkin != null) disabled @endif />
                    @error('checkinPrev')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="checkin" class="mb-2 block uppercase text-gray-600 font-bold">Fecha de devolucion</label>
                    <input type="date" id="checkin" name="checkin" value="{{$loan->checkin}}" class=" @if($loan->checkin != null) disabled:bg-gray-50 disabled:border-gray-200 @endif border p-3 w-full rounded-lg @error('checkin') border-red-500 @enderror" @if($loan->checkin != null) disabled @endif/>
                    @error('checkin')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="obser" class="mb-2 block uppercase text-gray-600 font-bold">Observaciones</label>
                    <textarea type="date" id="obser" name="obser" class=" @if($loan->checkin != null) disabled:bg-gray-50 disabled:border-gray-200 @endif overflow-auto scrollbar-hide border p-3 w-full rounded-lg @error('obser') border-red-500 @enderror" @if($loan->checkin != null) disabled @endif>{{$loan->obser}}</textarea>
                    @error('obser')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>                                                    
                <input type="hidden" name="id" value="{{$loan->id}}">
                @if($loan->checkin == null)
                <p class="text-center text-red-600">Recuerda que si introduces la fecha de devolucion se da por finalizado el prestamo, con lo cual ya no podras volver a editarlo</p>
                <input type="submit" id="updateLoan" value="Guardar cambios" class="mt-2 bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                <a href="{{route('loan.index')}}">                    
                    <button type="button" class="mt-2 bg-gradient-to-l from-gray-300 to-gray-400 hover:bg-gradient-to-l hover:from-gray-400 hover:to-gray-500 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">Volver</button>
                </a>
                @else
                <a href="{{route('loan.index')}}">                    
                    <button type="button" class="bg-gradient-to-l from-gray-300 to-gray-400 hover:bg-gradient-to-l hover:from-gray-400 hover:to-gray-500 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">Cancelar</button>
                </a>
                @endif
            </form>
        </div>
    </div>

@endsection