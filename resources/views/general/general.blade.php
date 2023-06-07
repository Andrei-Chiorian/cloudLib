@extends('layouts.app')
@push('jquery')
<script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
@vite('resources/js/app.js')
@endpush

@section('titulo')
- Afiliados - General
@endsection
        
@section('contenido')
        <div class=" h-screen p-3 pt-5 flex flex-col gap-y-1 bg-gray-300 rounded">
            <div class="text-2xl flex items-center justify-center font-bold text-gray-700">
                General
            </div>

            <div class="shadow-inner rounded p-2 bg-gray-100 flex gap-8 items-center">
                <div class="flex gap-2">

                    <!-- BUSCAR -->
                    <div>
                        <form action="">
                            <input type="text" name="searchBar" id="searchBar">
                            <!-- boton -->
                            <button data-modal-target="search-modal" data-modal-toggle="search-modal" class="border rounded p-1 px-2 text-white font-medium bg-blue-600 hover:bg-blue-700" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                                
                            </button>                       
                        </form> 
                    </div>
    
                    
    
                    <!-- NUEVO -->
                    <div>
                        <a href="{{route('create')}}">
                        <!-- boton -->
                            <button name="nuevo" id="nuevo" class="border rounded p-1 px-2 text-white font-medium bg-blue-600 hover:bg-blue-700" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                              
                            </button>
                        </a>                           
                    </div>                  
                    
                </div>

                @if (session('mensaje'))
                    <p id="mensaje" class="bg-green-600 text-white rounded-lg text-sm p-1 text-center">{{session('mensaje')}}</p>                                                       
                @endif
                @error('cod_persona')
                    <p id="mensaje" class="bg-red-600 text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</p>
                @enderror
                @error('dni_persona')
                    <p id="mensaje" class="bg-red-600 text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</p>
                @enderror                 

            </div>
            <div class="shadow-inner rounded p-2 bg-gray-100 h-full">
                <div class="bg-gray-200 h-full">               
                    <div class="flex flex-row p-1 bg-gray-300 gap-3 rounded-t">
                        <div class=" w-10">
                            Cod
                        </div>
                        <div class=" w-52">
                            Nombre y Apellidos
                        </div>
                        <div class=" w-20">
                            Dni
                        </div>
                        <div class=" w-20">
                            Telefono
                        </div>
                        <div class=" w-24">
                            F. Nac
                        </div>
                        <div class=" w-14 text-center">
                            Menor
                        </div>
                        <div class=" w-24">
                            F. Alta
                        </div>
                        <div class="w-8 text-center">
                            Baja
                        </div>
                        <div>
                            Email
                        </div>
                    </div>
                
                    @foreach ($personas as $persona)
                    <form action="{{route('find')}}" method="POST">
                    @csrf
                    <input type="text" class="w-10 bg-transparent cursor-pointer" name="cod" id="cod" value="{{$persona->Cod_Personas}}" hidden>
                    <input type="text" class="w-52 bg-transparent cursor-pointer" name="nom" id="nom" value="{{$persona->Nomb_Personas}} {{$persona->Apel_Personas}}" hidden>
                    
                        <button class="flex bg-gray-200 px-1 gap-3 w-full hover:border-1 hover:bg-white hover:border-black" type="submit">
                            <div class="w-10 text-blue-800 font-semibold">
                                {{$persona->Cod_Personas}}                    
                            </div>
                            <div class="w-52 text-left">
                                {{$persona->Nomb_Personas}} {{$persona->Apel_Personas}}
                            </div>
                            <div class="w-20">
                                {{$persona->Dni_Personas}}
                            </div>
                            <div class="w-20">
                                {{$persona->Tfn1_Personas}}                       
                            </div>
                            <div class="w-24">
                                {{$persona->FNac_Personas}}
                            </div>
                            <div class="w-14 text-center">
                                @if (now()->year - intval(substr($persona->FNac_Personas, 0,4)) >=18)
                                    Si
                                @else
                                    No    
                                @endif
                            </div>                    
                            <div class="w-24">
                                {{$persona->FAlt_Personas}}
                            </div>
                            <div class="w-8 text-center">
                                @if ($persona->Desc_Personas == 'on')
                                    Si
                                @else
                                    No    
                                @endif                        
                            </div>                    
                            <div class="">
                                {{$persona->Emai_Personas}}
                            </div>
                        </button>
                    </form>
                    @endforeach
                </div>
            </div>    
            
        </div>
    
    <script type="text/javascript">
        var message = @if (isset($message))$message @endif;        
    </script>
@endsection