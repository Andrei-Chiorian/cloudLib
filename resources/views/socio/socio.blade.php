@extends('layouts.app')
@push('js')
<script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
@vite('resources/js/socio.js')
@endpush

@section('titulo')
- Afiliados - Socios
@endsection
        
@section('contenido')
        <div class=" h-screen p-3 pt-5 flex flex-col gap-y-1 bg-gray-300 rounded">
            <div class="text-2xl flex items-center justify-center font-bold text-gray-700">
                Lista de Socios
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
                        <a href="{{route('create.socio')}}">
                        <!-- boton -->
                            <button name="nuevo" id="nuevo" class="border rounded p-1 px-2 text-white font-medium bg-blue-600 hover:bg-blue-700" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                              
                            </button>
                        </a>                           
                    </div>                  
                    
                </div>                
                @if (isset($mensaje))
                    <p id="mensaje" class="bg-green-600 text-white rounded-lg text-sm p-1 text-center">{{$mensaje}}</p>                                                       
                @endif                              

            </div>
            <div class="shadow-inner rounded p-2 bg-gray-100 h-full">
                <div class="bg-gray-200 h-full">               
                    <div class="flex flex-row p-1 bg-gray-300 gap-3 rounded-t">
                        <div class=" w-20">
                            Cod Socio
                        </div>
                        <div class=" w-16">
                            Cod Afil
                        </div>
                        <div class=" w-20">
                            Cod Club
                        </div>
                        <div class=" w-52">
                            Nombre
                        </div>
                        <div class=" w-20">
                            Cargo
                        </div>                        
                        <div class=" w-24">
                            F. Alta
                        </div>
                        <div class="w-24 text-center">
                            F. Baja
                        </div>                        
                    </div>
                
                    @foreach ($socios as $socio)
                    <form action="{{route('find.socio')}}" method="POST">
                    @csrf
                        <input type="text" class="w-10 bg-transparent cursor-pointer" name="cod" id="cod" value="{{$socio->Cod_Socios}}" hidden>                    
                    
                        <button class="flex bg-gray-200 px-1 gap-3 w-full hover:border-1 hover:bg-white hover:border-black" type="submit">
                            <div class="w-20 text-left text-blue-800 font-semibold">
                                {{$socio->Cod_Socios}}
                            </div>
                            <div class="w-16 text-left">
                                {{$socio->CPer_Socios}}                    
                            </div>                            
                            <div class="w-20 text-left">
                                {{$socio->CClu_Socios}}
                            </div>
                            <div class="w-52 text-left">
                                {{$socio->persona->Nomb_Personas}} {{$socio->persona->Apel_Personas}}                       
                            </div>
                            <div class="w-20 text-left">
                                {{$socio->Carg_Socios}}
                            </div>                                              
                            <div class="w-24 text-left">
                                {{$socio->FAlt_Socios}}
                            </div>                                              
                            <div class="w-24 text-left">
                                {{$socio->FBaj_Socios}}
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