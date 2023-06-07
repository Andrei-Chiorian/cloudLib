@extends('layouts.app')
@push('js')
<script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
@vite('resources/js/socio.js')
@endpush

@section('titulo')
- Afiliados
@endsection
        
@section('contenido')
    <div class="p-3 pt-5 flex flex-col gap-y-1 bg-gray-300 rounded">
        <div class="text-2xl flex items-center justify-center font-bold text-gray-700">
            @if (isset($socio)) Socio @else Crear Socio @endif
        </div>

        <div class="h-12 shadow-inner rounded p-2 pl-6 bg-gray-100 flex gap-8 items-center">
            <div class="flex gap-2">                    
                @if (isset($socio))
                   <!-- MODIFICAR -->
                    <div>
                        <!-- boton -->
                        <button name="modificar" id="modificar" class="border rounded p-1 px-2 text-white font-medium bg-blue-600 hover:bg-blue-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>                              
                        </button>                           
                    </div>                

                    <!-- ELIMINAR -->
                    <div>
                        <!-- boton -->
                        <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="border rounded p-1 px-2 text-white font-medium bg-red-600 hover:bg-red-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                                
                        </button>
                        
                        <div id="delete-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- contenido -->
                                <div class="relative bg-white rounded-lg shadow ">
                                    <div class="px-6 py-6 lg:px-8 text-center">
                                        <form class="space-y-6" action="{{route('delete.socio')}}" method="POST">
                                            @method('DELETE')
                                            @csrf                                        
                                            <p class="my-auto text-sm font-medium">Borrar al socio implica la perdida total de los datos del mismo, no asi del afiliado al que este vinculado</p>
                                            <p class="my-auto text-sm font-medium">Esta seguro que desea eliminar el socio?</p>                                     
                                            <input type="text" name="cod" id="cod" value="@isset($socio){{$socio->Cod_Socios}}@endisset{{old('codPer')}}" hidden>
                                            <div class="flex justify-center gap-3">
                                                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-hide="delete-modal">Cancelar</button>
                                            </div>
                                            
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                                                    
                    </div> 
                @endif                
            </div>                      
        </div>

        <form id="afilForm" action="{{route('store.socio')}}" method="post">
            @csrf
            <div class="relative flex p-3 pl-6 shadow-inner bg-gray-100 rounded">

                <div class="flex flex-col gap-y-5">

                    <div class="flex gap-2">
                        <div class="flex gap-36">
                            <div class="flex flex-col mt-2 gap-3">
                                <label for="codSoc">Codigo Socio:</label>
                                <label for="codPer">Codigo Afiliado:</label>
                                <label for="codClu">Codigo Club:</label>                                
                            </div>
                            
                            <div class="flex flex-col mt-2 gap-2">
                                <input type="text" name="codSoc" id="codSoc" class="w-16 border-2 rounded p-0 border-stone-500 text-right " value="@isset($socio){{$socio->Cod_Socios}}@endisset{{old('codSoc')}}" disabled="true">
                                <div class="flex gap-2">
                                    <input type="text" name="codPer" id="codPer" class="w-16 border-2 rounded p-0 border-stone-500 text-right " value="@isset($socio){{$socio->CPer_Socios}}@endisset{{old('codPer')}}" disabled="true">
                                    {{-- <select name="codPer" id="codPer">
                                        @isset($personas)
                                            @foreach ($personas as $persona)
                                                <option value="{{$persona->Cod_Personas}}">{{$persona->Cod_Personas}} {{$persona->Nomb_Personas}} {{$persona->Apel_Personas}}</option>
                                            @endforeach
                                        @endisset 
                                    </select> --}}
                                    @isset($socio)
                                        <button id="showPers" data-modal-target="persona-modal" data-modal-toggle="persona-modal" class="border rounded p-1 font-medium bg-gray-300 hover:bg-gray-400" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>                                               
                                        </button>
                                    @else
                                        <button id="searchPers" data-modal-target="search-persona-modal" data-modal-toggle="search-persona-modal" class="border rounded p-1 font-medium bg-gray-300 hover:bg-gray-400" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>                                                                                            
                                        </button>
                                    @endisset  
                                </div>
                                <div class="flex gap-2">
                                    <input type="text" name="codClu" id="codClu" class="justify-self-end w-16 border-2 rounded p-0 border-stone-500 text-right " value="@isset($socio){{$socio->CClu_Socios}}@endisset{{old('codClu')}}" disabled="true">
                                    @if (!isset($socio))
                                        <button id="searchClub" data-modal-target="search-club-modal" data-modal-toggle="search-club-modal" class="border rounded p-1 font-medium bg-gray-300 hover:bg-gray-400" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>                                                                                            
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mt-2 gap-2">
                            <div class="h-7">
                                @error('codSoc')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="h-7">
                                @error('codPer')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror                                
                            </div>
                            <div class="h-7">
                                @error('codClu')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                           
                    </div>                                               
                </div>

                <div class="absolute right-44 2xl:ml-44">
                    <div>
                        <img class="h-28 w-28" src=" @if(isset($socio)) {{$socio->persona->NFot_Personas ? asset('profile' . '/' . $socio->persona->NFot_Personas) : asset('profile/usuario.svg')}} @else {{asset('profile/usuario.svg')}} @endif " alt="Imagen Persona">
                    </div>
                    <div class="mt-1">
                        <button id="fotoCamb" class="border rounded p-1 px-2 font-medium bg-gray-300 hover:bg-gray-400" hidden>Cambiar foto</button>
                    </div>      
                    
                </div>
            </div>

            <div class=" p-3 pl-6 flex flex-col gap-y-3 shadow-inner bg-gray-100 rounded">
                <p class="font-bold">DATOS DEL SOCIO</p>
                <div class="flex gap-2">
                    <div class="flex gap-20">
                        <div class="flex flex-col gap-y-3">
                            <label for="nombre">Nombre:</label>
                            <label for="club">Club:</label>
                            <label for="fAlta">Fecha de Alta</label>
                            <label for="carg">Cargo:</label>
                            <label for="cCuo">Codigo de Cuota:</label>
                            <div class="mt-4 flex gap-2">
                                <input type="checkbox" name="soFu" id="soFu" class="border-2 rounded p-0 border-stone-500 text-right" @isset($socio)@if($socio->SoFu_Socios != null) checked @endif @endisset @checked(old('soFu')) @if(isset($socio)) disabled="true" @endif>                                  
                                <label for="soFu">Socio Fundador</label>                                
                            </div>                              
                        </div>
                        
                        <div class="flex flex-col items-end gap-y-2">
                            <input type="text" name="nombre" id="nombre" class="w-52 border-2 rounded p-0 border-stone-500 text-right"value="@isset($socio){{$socio->persona->Nomb_Personas}} {{$socio->persona->Apel_Personas}}@endisset{{old('nombre')}}" disabled="true">

                            <input type="text" name="club" id="club" class="w-24 border-2 rounded p-0 border-stone-500 text-right"value="@isset($socio){{$socio->CClu_Socios}}@endisset{{old('club')}}" disabled="true">

                            <input type="date" name="fAlta" id="fAlta" class="w-32 border-2 rounded p-0 border-stone-500 text-right"value="@isset($socio){{$socio->FAlt_Socios}}@endisset{{old('fAlta')}}" @if(isset($socio)) disabled="true" @endif>                         

                            <select name="carg" id="carg" class="w-36 border-2 rounded border-stone-500 text-center text-gray-700" @if(isset($socio)) disabled="true" @endif>
                                <option value="" disabled  @if(!isset($socio)) selected @endif hidden>Elegir Cargo</option>
                                @foreach ($cargos as $cargo )
                                    <option value="{{$cargo->Cod_Cargos}}" @isset($socio)@if($socio->Carg_Socios == $cargo->Cod_Cargos) selected @endif @endisset>{{$cargo->Desc_Cargos}}</option>
                                @endforeach
                                <option value="">Sin Cargo</option>                                                                  
                            </select>                            
                            <select name="cCuo" id="cCuo" class="w-28 border-2 rounded border-stone-500 text-center text-gray-700" @if(isset($socio)) disabled="true" @endif>
                                <option value="" disabled @if(!isset($socio)) selected @endif hidden>Elegir Cuota</option>
                                <option value="1"  @isset($socio)@if(1 == $cargo->Cod_Cargos) selected @endif @endisset>Cuota 1 <img class="h-3" src="{{asset('profile/usuario.svg')}}" alt=""></option>
                                <option value="2"  @isset($socio)@if(2 == $cargo->Cod_Cargos) selected @endif @endisset>Cuota 2</option> 
                                <option value="3"  @isset($socio)@if(3 == $cargo->Cod_Cargos) selected @endif @endisset>Cuota 3</option> 
                                <option value="0"  @isset($socio)@if(0 == $cargo->Cod_Cargos) selected @endif @endisset>Sin Cuota</option>                                                                  
                            </select>
                                                     
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-2">
                        <div class="h-7">
                            @error('nombre')
                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="h-7">
                            @error('club')
                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                            @enderror                                
                        </div>
                        <div class="h-7">
                            @error('fAlta')
                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="h-7">
                            @error('carg')
                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="h-7">
                            @error('cCuo')
                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="h-7">
                            @error('soFu')
                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                </div> 
            </div>

            <div class="p-3 pl-6 flex flex-col gap-y-3 shadow-inner bg-gray-100 rounded">
                <div class="flex gap-2">
                <p class="font-bold">ESTADO</p>
                @isset($socio)
                    @if ($socio->FBaj_Socios == null)
                        <p class="font-semibold text-green-600">ALTA</p>
                    @else
                        <p class="font-semibold text-red-600">BAJA</p>
                    @endif
                @endisset
                </div>                    
                <div class="flex gap-2">
                    <div class="flex gap-44">                            
                        <label class="mr-3" for="fBaj">Fecha de Baja:</label>                
                        <input type="date" name="fBaj" id="fBaj" class="w-32 border-2 rounded p-0 border-stone-500 text-right" value="@isset($socio){{$socio->FBaj_Socios}}@endisset{{old('domicilio')}}" @if(isset($socio)) disabled="true" @endif>                                                 
                    </div>                   
                    
                    <div class="h-7">
                        @error('domicilio')
                            <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                        @enderror
                    </div>            
                </div>
                <label for="moti">Motivo:</label>   
                <textarea name="moti" id="moti" cols="5" rows="5" class="w-96 rounded" @if(isset($socio)) disabled="true" @endif @if(isset($socio)) @endif>@isset($socio){{$socio->Moti_Socios}}@endisset{{old('provincia')}}</textarea>
                
                <div class="mt-2 self-center">
                    <button class="border rounded p-1 px-2 shadow bg-blue-600 hover:bg-gray-700 text-white font-medium" type="submit" name="nuevoSoci" id="nuevoSoci" @if (isset($persona))hidden @endif>
                        Crear Socio
                    </button>
                </div>
            </div>               
        </form>              
    </div>


    <!-- LISTA AFILIADOS-->                                                                           
    <!-- main -->
    <div id="search-persona-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-fit max-h-full">
            <!-- contenido -->
            <div class="relative bg-white rounded-lg shadow">
                <button id="closePadre" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="search-persona-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8 flex flex-col">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">Lista de Afiliados</h3>
                    <div id="buttDivPers" class="flex flex-col gap-2">
                        @isset($personas)                            
                            @foreach ($personas as $persona)
                                <button id="pers{{$persona->Cod_Personas}}" class="hover:border-1 hover:bg-gray-100 hover:border-black" value="{{$persona->Cod_Personas}}" data-modal-hide="search-persona-modal">
                                    <div class="flex gap-2 w-full">
                                        <div class="w-14">{{$persona->Cod_Personas}}</div>
                                        <div id="nombPers{{$persona->Cod_Personas}}" class="w-52 text-left">{{$persona->Nomb_Personas}} {{$persona->Apel_Personas}}</div>
                                        <div class="self-end">
                                            <img class="h-6 w-6" src="{{$persona->NFot_Personas ? asset('profile' . '/' . $persona->NFot_Personas) : asset('profile/usuario.svg')}}" alt="Imagen Persona">
                                        </div>
                                    </div>
                                </button>
                            @endforeach
                        @endisset
                    </div>                    
                </div>
            </div>
        </div>
    </div>



    <!-- LISTA CLUBES-->                                                                           
    <!-- main -->
    <div id="search-club-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-fit max-h-full">
            <!-- contenido -->
            <div class="relative bg-white rounded-lg shadow">
                <button id="closePadre" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="search-club-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8 flex flex-col">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">Lista de Clubes</h3>
                    <div id="buttDivClubs" class="flex flex-col gap-2">
                        @isset($clubs)
                            @foreach ($clubs as $club)
                            <button id="club{{$club->Cod_Clubs}}" class="hover:border-1 hover:bg-gray-100 hover:border-black" value="{{$club->Cod_Clubs}}" data-modal-hide="search-club-modal">
                                <div class="flex gap-2 w-full">
                                    <div class="w-14">{{$club->Cod_Clubs}}</div>
                                    <div id="nombClub{{$club->Cod_Clubs}}" class="w-36 text-left">{{$club->Nomb_Clubs}}</div>
                                    <div class="self-end">
                                        <img class="h-6 w-6" src="{{$club->Logo_Clubs ? asset('logo' . '/' . $club->Logo_Clubs) : asset('logo/logo.png')}}" alt="Imagen Persona">
                                    </div>
                                </div>
                            </button>
                            @endforeach
                        @endisset
                    </div>                   
                </div>
            </div>
        </div>
    </div>

    
    <!-- MOSTAR AFILIADO-->                                                                           
    <!-- main -->
    <div id="persona-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-fit max-h-full">
            <!-- contenido -->
            <div class="relative bg-white rounded-lg shadow">
                <button id="closePadre" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="persona-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8 flex flex-col gap-3">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">Datos del Afiliado</h3>
                                                                        
                    <div class="flex gap-3">
                        <div class="flex flex-col gap-4">
                            <label for="codPadre" class="text-sm font-medium text-gray-900 ">Codigo:</label>
                            <label for="nomPadre" class=" text-sm font-medium text-gray-900 ">Apellidos:</label>
                            <label for="dniPadre" class=" text-sm font-medium text-gray-900 ">Nombre:</label>                              
                            <label for="poblPadre" class=" text-sm font-medium text-gray-900 ">F.Nacimiento:</label>
                            <label for="provPadre" class=" mt-1 text-sm font-medium text-gray-900 ">DNI:</label>
                            <label for="telfPadre" class=" text-sm font-medium text-gray-900 ">Telefono:</label>
                            <label for="emailPadre" class=" text-sm font-medium text-gray-900 ">Email:</label>
                            <label for="variosPadre" class=" text-sm font-medium text-gray-900 ">Domicilio:</label>
                            <label for="variosPadre" class=" text-sm font-medium text-gray-900 ">Provincia:</label>
                            <label for="predPadre" class="text-sm font-medium text-gray-900 ">Fecha de Alta:</label>
                                
                        </div>
                        <div class="flex flex-col gap-2 items-end">
                            <input type="text" name="codDescPers" id="codDescPers" class="w-14 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->Cod_Personas}}@endisset" disabled="true">

                            <input type="text" name="apelDescPers" id="apelDescPers" class="w-52 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->Apel_Personas}}@endisset" disabled="true"> 

                            <input type="text" name="nombDescPers" id="nombDescPers" class="w-32 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->Nomb_Personas}}@endisset" disabled="true"> 

                            <input type="text" name="fNacDescPers" id="fNacDescPers" class="w-24 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->FNac_Personas}}@endisset" disabled="true"> 

                            <input type="text" name="dniDescPers" id="dniDescPers" class="w-24 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->Dni_Personas}}@endisset" disabled="true"> 

                            <input type="text" name="telfDescPers" id="telfDescPers" class="w-24 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->Tfn1_Personas}}@endisset" disabled="true"> 

                            <input type="text" name="emailDescPers" id="emailDescPers" class="w-80 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->Emai_Personas}}@endisset" disabled="true">

                            <div>
                                <input type="text" name="cPosDescPers" id="cPosDescPers" class="w-14 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->CPos_Personas}}@endisset" disabled="true">
                                <input type="text" name="poblDescPers" id="poblDescPers" class="w-52 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->Pobl_Personas}}@endisset" disabled="true">
                            </div>  

                            <input type="text" name="provDescPers" id="provDescPers" class="w-52 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->Prov_Personas}}@endisset" disabled="true">

                            <input type="text" name="fAltaDescPers" id="fAltaDescPers" class="w-24 border-2 rounded px-1 border-stone-500 text-right" value="@isset($socio){{$socio->persona->FAlt_Personas}}@endisset" disabled="true">
                        </div>                                                       
                </div>
                <div class="flex mt-2 gap-4">                    
                    <label for="" class="my-auto text-sm font-medium text-gray-900 ">Menor:</label>
                    @isset($socio)
                        @if ($socio->persona->CPad_Personas != null || $socio->persona->CMad_Personas != null)
                            <p class="text-red-600">Si</p>
                        @else
                            <p class="text-green-600">NO</p>
                        @endif
                    @endisset

                    <label for="" class="my-auto text-sm font-medium text-gray-900 ">Descatalogado:</label>

                    @isset($socio)
                        @if ($socio->persona->Desc_Personas != null)
                            <p class="text-red-600">Si</p>
                        @else
                            <p class="text-green-600">NO</p>
                        @endif
                    @endisset

                    <label for="" class="my-auto text-sm font-medium text-gray-900 ">LOPD:</label>

                    @isset($socio)
                        @if ($socio->persona->Lopd_Personas != null)
                            <p class="text-green-600">Si</p>
                        @else
                            <p class="text-red-600">NO</p>
                        @endif
                    @endisset
                </div>
                <form action="{{route('find')}}" method="post" class="text-center">
                @csrf
                    <button name="irAfil" class="cursor-pointer w-fit self-center text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5" data-modal-hide="padre-modal">Ir a afiliado</button>
                    <input type="text" name="cod" id="cod" value="@isset($socio){{$socio->persona->Cod_Personas}}@endisset" hidden>
                    <input type="text" name="nom" id="nom" value="@isset($socio){{$socio->persona->Nomb_Personas}}@endisset" hidden>
                </form> 
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var message = @if (isset($message))$message @endif;        
    </script>
@endsection