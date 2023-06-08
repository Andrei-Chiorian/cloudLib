@extends('layouts.app')

@section('titulo')
Prestamos &#8226; {{auth()->user()->username}} &#8226; CloudLib
@endsection

@section('contenido')

    <div class="mx-auto px-5">
        <div class="rounded p-3 shadow bg-white mb-3">
            <a href="{{route('home')}}">
                <button class="w-fit text-blue-600 hover:text-blue-800 hover:scale-105 flex font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                    </svg>
                    Volver a la pagina principal
                </button>
            </a>            
        </div>

        <div class=" rounded p-3 shadow bg-white">           
            <div class="font-bold text-xl">
                PRESTAMOS EN CURSO
            </div>
            <div class="mt-8 flex flex-row p-1 bg-gradient-to-t from-slate-300 to-slate-400 font-semibold gap-3 rounded-t">
                <div class=" w-60">
                    Titulo
                </div>
                <div class=" w-52">
                    Biblioteca
                </div>
                <div class=" w-48">
                    Prestatario
                </div>
                <div class=" w-24">
                    Prestamo
                </div>                
                <div class=" w-36">
                    Devolucion prevista
                </div>
                <div class=" w-32">
                    Devolucion 
                </div>
                <div class="">
                    Observaciones
                </div>                
            </div>
            
            @foreach ($libraries as $library)
                @foreach ($library->loans as $loan)                    
                    @if($loan->checkin == null)                                                 
                        <form action="{{route('loan.update.show')}}" method="post">
                            @csrf                                  
                            <button id="sendLoan1" type="submit" class="flex bg-gray-200 px-1 gap-3 w-full hover:border-1 hover:bg-white hover:border-black text-left" type="button">
                                <input type="hidden" id="title" name="title" value="{{$loan->book->name}}">                   
                                <input type="hidden" id="library" name="library" value="{{$loan->book->library->name}}">                         
                                <input type="hidden" id="id" name="id" value="{{$loan->id}}">                         
                                <div class=" w-60 text-blue-800 font-semibold">
                                    {{$loan->book->name}}
                                </div>
                                <div class=" w-52 text-blue-800 font-semibold">
                                    {{$loan->book->library->name}}
                                </div>
                                <div class=" w-48">
                                    {{$loan->person}}
                                </div>
                                <div class=" w-24">
                                    {{$loan->checkout}}
                                </div>                
                                <div class=" w-36">
                                    {{$loan->checkinPrev}}
                                </div>
                                <div class=" w-32 @if($loan->today() > $loan->checkinPrev) text-red-600 @else text-green-600 @endif">
                                    {{$loan->daysLast($loan->checkinPrev)}} dias @if($loan->today() > $loan->checkinPrev) retraso @else restantes @endif
                                </div>
                                <div class="overflow-auto whitespace-nowrap scrollbar-hide w-36 2xl:w-96">
                                    <p class="">
                                        {{$loan->obser}}
                                    </p>                                    
                                </div>                                                              
                            </button>
                        </form>                   
                    @endif               
                @endforeach
            @endforeach
            @if(!count($libraries))
                <p class="mt-4 text-center">No hay ningun prestamo en curso</p>
            @endif                       
        </div>

        <div class="mt-3 rounded p-3 shadow bg-white">           
            <div class="font-bold text-xl">
                PRESTAMOS FINALIZADOS
            </div>
            <div class="mt-8 flex flex-row p-1 bg-gradient-to-t from-slate-300 to-slate-400 font-semibold gap-3 rounded-t">
                <div class="w-60">
                    Titulo
                </div>
                <div class=" w-52">
                    Biblioteca
                </div>
                <div class=" w-48">
                    Prestatario
                </div>
                <div class=" w-24">
                    Prestamo
                </div>                
                <div class=" w-36">
                    Devolucion prevista
                </div>
                <div class=" w-32">
                    Devolucion 
                </div>
                <div class="">
                    Observaciones
                </div>                
            </div>                       
            @foreach ($libraries as $library)
                @foreach ($library->loans as $loan)                    
                    @if ($loan->checkin != null)
                        <form action="{{route('loan.update.show')}}" method="post">
                            @csrf                                  
                            <button id="sendLoan2" type="submit" class="flex bg-gray-200 px-1 gap-3 w-full hover:border-1 hover:bg-white hover:border-black text-left" type="button">
                                <input type="hidden" id="title" name="title" value="{{$loan->book->name}}">                   
                                <input type="hidden" id="library" name="library" value="{{$loan->book->library->name}}" >                         
                                <input type="hidden" id="id" name="id" value="{{$loan->id}}">                         
                                <div class=" w-60 text-blue-800 font-semibold">
                                    {{$loan->book->name}}
                                </div>
                                <div class=" w-52 text-blue-800 font-semibold">
                                    {{$loan->book->library->name}}
                                </div>
                                <div class=" w-48">
                                    {{$loan->person}}
                                </div>
                                <div class=" w-24">
                                    {{$loan->checkout}}
                                </div>                
                                <div class=" w-36">
                                    {{$loan->checkinPrev}}
                                </div>
                                <div class=" w-32">
                                    {{$loan->checkin}}
                                </div>
                                <div class="overflow-auto whitespace-nowrap scrollbar-hide w-36 2xl:w-96">
                                    {{$loan->obser}}
                                </div>                                                        
                            </button>
                        </form>
                    @endif               
                @endforeach
            @endforeach            
            @if(!count($libraries))
                <p class="mt-4 text-center">Todavia no ha realizado ningun prestamo</p>
            @endif                   
        </div>
    </div>
@endsection