@extends('layouts.app')
@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    @vite('resources/js/app.js')
@endpush
@section('titulo')
- Afiliados @if (isset($persona->Cod_Personas))- {{$persona->Nomb_Personas}} {{$persona->Apel_Personas}} @endif
@endsection        
@section('contenido')
        <div class=" p-3 pt-5 flex flex-col gap-y-1 bg-gray-300 rounded">
            <div class="text-2xl flex items-center justify-center font-bold text-gray-700">
                General
            </div>

            <div class="shadow-inner rounded p-2 pl-6 bg-gray-100 flex gap-8 items-center">
                <div class="flex gap-2">                   
    
                    <!-- MODIFICAR -->
                    <div>
                        <!-- boton -->
                        <button name="modificar" id="modificar" class="boti border rounded p-1 px-2 text-white font-medium bg-blue-600 hover:bg-blue-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>                              
                        </button>                           
                    </div>                    
                       

                    </script>
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
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
    
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Eliminar un afiliado</h3>
    
                                        <form class="space-y-6" action="{{route('delete')}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="flex gap-3">
                                                <label for="cod_persona" class="my-auto text-sm font-medium text-gray-900 dark:text-white">Codigo de afiliado</label>
                                                <input type="text" name="cod_persona" id="cod_persona" class="h-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm text-right rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 px-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Codigo" >
                                            </div>                                                              
                                           
                                            <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                                                 
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
            <form id="afilForm" action="{{route('store')}}" method="post">
                @csrf
                <div class="relative flex p-3 pl-6 shadow-inner bg-gray-100 rounded">

                    <div class="flex flex-col gap-y-5 justify-end">

                        <div class="flex gap-2">
                            <div class="flex gap-36">
                                <div class="flex flex-col mt-2 gap-3">
                                    <label for="codigo">Codigo:</label>
                                    <label for="apellidos">Apellidos:</label>
                                    <label for="nombre">Nombre:</label>                                
                                </div>
                                
                                <div class="flex flex-col mt-2 items-end gap-2">
                                    <input type="text" name="codigo" id="codigo" class="w-16 border-2 rounded p-0 border-stone-500 text-right " value="@isset($persona){{$persona->Cod_Personas}}@endisset{{old('codigo')}}" disabled="true">
                                    <input type="text" name="apellidos" id="apellidos" class="w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($persona){{$persona->Apel_Personas}}@endisset{{old('apellidos')}}" @if(isset($persona)) disabled="true" @endif>
                                    <input type="text" name="nombre" id="nombre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($persona){{$persona->Nomb_Personas}}@endisset{{old('nombre')}}" @if(isset($persona)) disabled="true" @endif >
                                </div>
                            </div>

                            <div class="flex flex-col mt-2 gap-2">
                                <div class="h-7">
                                    @error('codigo')
                                        <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="h-7">
                                    @error('apellidos')
                                        <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                    @enderror                                
                                </div>
                                <div class="h-7">
                                    @error('nombre')
                                        <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>     
                            <div class="gap-2">
                                <input type="checkbox" name="lopd" id="lopd" class="border-2 rounded p-0 border-stone-500" @isset($persona)@if($persona->Lopd_Personas != null) checked @endif @endisset @checked(old('lopd')) @if(isset($persona)) disabled="true" @endif>
                                <label for="lopd">Ha firmado la hoja de consentimiento de la LOPD</label>                        
                            </div> 
                        
                    </div>
                    <div class="absolute right-44 2xl:ml-44">
                        <div>
                            <img class="h-28 w-28" src=" @if(isset($persona)) {{$persona->NFot_Personas ? asset('profile' . '/' . $persona->NFot_Personas) : asset('profile/usuario.svg')}} @else {{asset('profile/usuario.svg')}} @endif " alt="Imagen Persona">
                        </div>
                        <div class="mt-1">
                            <button id="fotoCamb" class="border rounded p-1 px-2 font-medium bg-gray-300 hover:bg-gray-400" @if(isset($persona)) hidden @endif>Cambiar foto</button>
                        </div>      
                        
                    </div>
                </div>

                <div class=" p-3 pl-6 flex flex-col gap-y-3 shadow-inner bg-gray-100 rounded">
                    <p class="font-bold">DATOS PERSONALES</p>
                    <div class="flex gap-2">
                        <div class="flex">
                            <div class="flex flex-col gap-y-3">
                                <label for="Fnaci">F.Nacimiento:</label>
                                <label for="dni">DNI:</label>
                                <label for="telf">Teléfono:</label>
                                <label for="email">Email:</label>                            
                            </div>
                            
                            <div class="flex flex-col items-end gap-y-2">
                                <input type="date" name="fnaci" id="fnaci" class="w-32 border-2 rounded p-0 border-stone-500 text-right"value="@isset($persona){{$persona->FNac_Personas}}@endisset{{old('fnaci')}}" @if(isset($persona)) disabled="true" @endif>
                                <input type="text" name="dni" id="dni" class="w-24 border-2 rounded p-0 border-stone-500 text-right"value="@isset($persona){{$persona->Dni_Personas}}@endisset{{old('dni')}}" @if(isset($persona)) disabled="true" @endif>
                                <div class="">
                                    <input type="text" name="telf" id="telf" class="w-24 border-2 rounded p-0 border-stone-500 text-right"value="@isset($persona){{$persona->Tfn1_Personas}}@endisset{{old('telf')}}" @if(isset($persona)) disabled="true" @endif>
                                    -
                                    <input type="text" name="telf2" id="telf2" class="w-24 border-2 rounded p-0 border-stone-500 text-right"value="@isset($persona){{$persona->Tfn2_Personas}}@endisset{{old('telf2')}}" @if(isset($persona)) disabled="true" @endif>
                                </div>    
                                <input type="text" name="email" id="email"  class="w-80 border-2 rounded p-0 border-stone-500 text-right" value="@isset($persona){{$persona->Emai_Personas}}@endisset{{old('email')}}" @if(isset($persona)) disabled="true" @endif>
                            </div>
                        </div>
                        
                        <div class="flex flex-col gap-2">
                            <div class="h-7">
                                @error('fnaci')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="h-7">
                                @error('dni')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror                                
                            </div>
                            <div class="h-7">
                                @error('telf')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="h-7">
                                @error('email')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                    </div> 
                </div>

                <div class="p-3 pl-6 flex flex-col gap-y-3 shadow-inner bg-gray-100 rounded">
                    <p class="font-bold">DIRECCION</p>
                    <div class="flex gap-2">
                        <div class="flex gap-5">
                            <div class="flex flex-col gap-y-3">
                                <label for="domicilio">Domicilio:</label>
                                <label for="provincia">Provincia:</label>
                                <label for="cpostal">C.Pos-Poblacion:</label>                        
                            </div>
                            
                            <div class="flex flex-col gap-y-2 items-end">
                                <input type="text" name="domicilio" id="domi" class="w-52 border-2 rounded p-0 border-stone-500 text-right" value="@isset($persona){{$persona->Domi_Personas}}@endisset{{old('domicilio')}}" @if(isset($persona)) disabled="true" @endif>
                                <input type="text" name="provincia" id="prov" class="w-52 border-2 rounded p-0 border-stone-500 text-right" value="@isset($persona){{$persona->Prov_Personas}}@endisset{{old('provincia')}}" @if(isset($persona)) disabled="true" @endif>
                                <div>                        
                                    <input type="text" name="cpostal" id="cpos" class="w-14 border-2 rounded p-0 border-stone-500 text-right" value="@isset($persona){{$persona->CPos_Personas}}@endisset{{old('cpostal')}}" @if(isset($persona)) disabled="true" @endif>
                                    -
                                    <input type="text" name="poblacion" id="pobl" class="w-52 border-2 rounded p-0 border-stone-500 text-right" value="@isset($persona){{$persona->Pobl_Personas}}@endisset{{old('poblacion')}}" @if(isset($persona)) disabled="true" @endif>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col items-start gap-2">
                            <div class="h-7">
                                @error('domicilio')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="h-7">
                                @error('provincia')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror                                
                            </div>
                            <div class="h-7 flex gap-2">                               
                                @error('cpostal')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror                               
                                @error('poblacion')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror                              
                            </div>                            
                        </div>
                        
                    </div>                    
                </div>
                <div class=" p-3 pl-6 flex flex-col gap-y-3 shadow-inner bg-gray-100 rounded">
                    <p class="font-bold">OTROS DATOS</p>
                    <div class="flex gap-2">
                        <div class="flex flex-col gap-y-3">
                            <div class="flex gap-52">
                                <label for="falta">Fecha Alta:</label>
                                <input type="date" name="falta" id="falta" class="w-32 border-2 rounded p-0 border-stone-500 text-right" value="@isset($persona){{$persona->FAlt_Personas}}@endisset{{old('falta')}}" @if(isset($persona)) disabled="true" @endif>
                            </div>
                            
                            <div class="flex gap-44">
                                <label for="grupo-fam">Grupo Fam:</label>                    
                                <select name="grupoFam" id="grupoFam" class="ml-3 w-36 border-2 rounded border-stone-500 text-center text-gray-700" @if(isset($persona)) disabled="true" @endif>
                                    <option value="" disabled selected hidden>Elegir Grupo</option>
                                    <option value="">Mañana infantil</option>
                                    <option value="">Mañana adultos</option> 
                                    <option value="">Tarde infantil</option> 
                                    <option value="">Tarde adultos</option>                                     
                                </select>                     
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <div class="h-7">
                                @error('falta')
                                    <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                @enderror
                            </div>                                                   
                        </div>
                        
                    </div>

                    <div class="border-2 rounded border-slate-400 p-3 
                    @if($errors->has('codPadre')||$errors->has('nomPadre')||$errors->has('dniPadre')||$errors->has('domiPadre')||$errors->has('cposPadre')||$errors->has('poblPadre')||$errors->has('provPadre')||$errors->has('telfPadre')||$errors->has('telf2Padre')||$errors->has('emailPadre')||$errors->has('variosPadre')||$errors->has('predPadre')||$errors->has('codMadre')||$errors->has('nomMadre')||$errors->has('dniMadre')||$errors->has('domiMadre')||$errors->has('cposMadre')||$errors->has('poblMadre')||$errors->has('provMadre')||$errors->has('telfMadre')||$errors->has('telf2Madre')||$errors->has('emailMadre')||$errors->has('variosMadre')||$errors->has('predMadre')) 
                        border-red-600 
                    @endif 
                    flex flex-col gap-y-3 w-fit">

                        <div class="flex gap-2">
                            <p class="font-semibold">Menores de edad</p>                             
                        </div>

                        <div class="flex">
                            <div class="flex flex-col gap-y-3">
                                <label for="padre">Padre:</label>
                                <label for="cod-madre">Madre:</label>                                                
                            </div>
                            <div class="flex flex-col justify-end items-end gap-y-2">                                
                                <div class="flex gap-1 items-center">
                                    <input type="text" name="cod_padre" id="cod_padre" class="w-16 border-2 rounded p-0 border-stone-500 text-right ml-16" value="@isset($padre){{$padre->Cod_Padres}}@endisset{{old('codPadre')}}" disabled="true">
                                    -
                                    <input type="text" name="nom_padre" id="nom_padre" class="w-52 border-2 rounded p-0 border-stone-500 text-right"value="@isset($padre){{$padre->Nomb_Padres}}@endisset{{old('nomPadre')}}" disabled="true">
                                    
                                    <!-- EDITAR PADRE-->
                                    <div>                                        
                                        <button id="editPadre" data-modal-target="padre-modal" data-modal-toggle="padre-modal" class="border rounded p-1 font-medium bg-gray-300 hover:bg-gray-400" type="button" @if(isset($persona))hidden @endif>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>                                              
                                        </button>
                                    <!-- MOSTRAR PADRE -->
                                        <button id="showPadre" data-modal-target="padre-modal" data-modal-toggle="padre-modal" class="border rounded p-1 font-medium bg-gray-300 hover:bg-gray-400" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>                                               
                                        </button>                                         
                                        <!-- main -->
                                        <div id="padre-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-fit max-h-full">
                                                <!-- contenido -->
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button id="closePadre" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="padre-modal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8 flex flex-col gap-3">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900">Editar Padre</h3>
                                                                                                            
                                                        <div class="flex gap-3">
                                                            <div class="flex flex-col gap-4">
                                                                <label for="codPadre" class="my-auto text-sm font-medium text-gray-900 ">Codigo:</label>
                                                                <label for="nomPadre" class="my-auto text-sm font-medium text-gray-900 ">Nombre:</label>
                                                                <label for="dniPadre" class="my-auto text-sm font-medium text-gray-900 ">DNI:</label>
                                                                <label for="domiPadre" class="my-auto text-sm font-medium text-gray-900 ">Domicilio:</label>
                                                                <label for="poblPadre" class="my-auto text-sm font-medium text-gray-900 ">CPos-Poblacion:</label>
                                                                <label for="provPadre" class="my-auto text-sm font-medium text-gray-900 ">Provincia:</label>
                                                                <label for="telfPadre" class="my-auto text-sm font-medium text-gray-900 ">Telefonos:</label>
                                                                <label for="emailPadre" class="my-auto text-sm font-medium text-gray-900 ">Email:</label>
                                                                <label for="variosPadre" class="my-auto text-sm font-medium text-gray-900 ">Varios Padres:</label>
                                                                <label for="predPadre" class="my-auto text-sm font-medium text-gray-900 ">Pred Padre:</label>
                                                            </div>
                                                            <div class="flex flex-col gap-2 items-end">
                                                                <input type="text" name="codPadre" id="codPadre" class="w-16 border-2 rounded p-0 border-stone-500 text-right "value="@isset($padre){{$padre->Cod_Padres}}@endisset{{old('codPadre')}}" disabled="true">                                                                    
                                                                <input type="text" name="nomPadre" id="nomPadre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Nomb_Padres}}@endisset{{old('nomPadre')}}" >
                                                                <input type="text" name="dniPadre" id="dniPadre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Dni_Padres}}@endisset{{old('dniPadre')}}" >
                                                                <input type="text" name="domiPadre" id="domiPadre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Domi_Padres}}@endisset{{old('domiPadre')}}" >
                                                                <div class="flex gap-1">
                                                                    <input type="text" name="cposPadre" id="cposPadre" class="justify-self-end w-14 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->CPos_Padres}}@endisset{{old('cposPadre')}}" >
                                                                    -
                                                                    <input type="text" name="poblPadre" id="poblPadre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Pobl_Padres}}@endisset{{old('poblPadre')}}" >
                                                                </div>
                                                                <input type="text" name="provPadre" id="provPadre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Prov_Padres}}@endisset{{old('provPadre')}}" >
                                                                <div class="flex gap-1">
                                                                    <input type="text" name="telfPadre" id="telfPadre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right "value="@isset($padre){{$padre->Tfn1_Padres}}@endisset{{old('telfPadre')}}" >
                                                                    -
                                                                    <input type="text" name="telf2Padre" id="telf2Padre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Tfn2_Padres}}@endisset{{old('telf2Padre')}}" >
                                                                </div>
                                                                <input type="text" name="emailPadre" id="emailPadre" class="justify-self-end w-80 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Emai_Padres}}@endisset{{old('emailPadre')}}" >
                                                                <input type="text" name="variosPadre" id="variosPadre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Varios_Padres}}@endisset{{old('variosPadre')}}" >
                                                                <input type="text" name="predPadre" id="predPadre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($padre){{$padre->Pred_Padres}}@endisset{{old('predPadre')}}" >
                                                            </div>                                                
                                                        </div>
                                                        <div class="flex flex-col items-center gap-2">
                                                            
                                                            @error('nomPadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                            
                                                        
                                                            @error('dniPadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                    
                                                        
                                                            @error('domiPadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                   
                                                                                        
                                                            @error('cposPadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                               
                                                            @error('poblPadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                     
                                                        
                                                            @error('provPadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                     
                                                        
                                                            @error('telfPadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                    
                                                        
                                                            @error('emailPadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                
                                                                                       
                                                        </div>
                                                        <button id="savePadre" type="button" class="w-fit self-center text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-modal-hide="padre-modal">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                                </div>
                                <div class="flex gap-1 items-center">
                                    <input type="text" name="cod_madre" id="cod_madre" class="w-16 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Cod_Padres}}@endisset{{old('codMadre')}}" disabled="true">
                                    -
                                    <input type="text" name="nom_madre" id="nom_madre"class="w-52 border-2 rounded p-0 border-stone-500 text-right" value="@isset($madre){{$madre->Nomb_Padres}}@endisset{{old('nomMadre')}}" disabled="true">
                                    
                                    <!-- EDITAR MADRE -->
                                    <div>                                       
                                        <button id="editMadre" data-modal-target="madre-modal" data-modal-toggle="madre-modal" class="border rounded p-1 font-medium bg-gray-300 hover:bg-gray-400" type="button" @if(isset($persona))hidden @endif>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>                                              
                                        </button>
                                        <!-- MOSTRAR MADRE -->
                                        <button id="showMadre" data-modal-target="madre-modal" data-modal-toggle="madre-modal" class="border rounded p-1 font-medium bg-gray-300 hover:bg-gray-400" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>                                                                                         
                                        </button>
                                        
                                        <!-- main -->
                                        <div id="madre-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-fit max-h-full">
                                                <!-- contenido -->
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button id="closeMadre" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="madre-modal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>                                                    
                                                    <div class="px-6 py-6 lg:px-8 flex flex-col gap-3">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900">Editar Madre</h3>
                                                                                                            
                                                        <div class="flex gap-3">
                                                            <div class="flex flex-col gap-4">
                                                                <label for="codMadre" class="my-auto text-sm font-medium text-gray-900 ">Codigo:</label>
                                                                <label for="nomMadre" class="my-auto text-sm font-medium text-gray-900 ">Nombre:</label>
                                                                <label for="dniMadre" class="my-auto text-sm font-medium text-gray-900 ">DNI:</label>
                                                                <label for="domiMadre" class="my-auto text-sm font-medium text-gray-900 ">Domicilio:</label>
                                                                <label for="poblMadre" class="my-auto text-sm font-medium text-gray-900 ">CPos-Poblacion:</label>
                                                                <label for="provMadre" class="my-auto text-sm font-medium text-gray-900 ">Provincia:</label>
                                                                <label for="telfMadre" class="my-auto text-sm font-medium text-gray-900 ">Telefonos:</label>
                                                                <label for="emailMadre" class="my-auto text-sm font-medium text-gray-900 ">Email:</label>
                                                                <label for="variosMadre" class="my-auto text-sm font-medium text-gray-900 ">Varios Padres:</label>
                                                                <label for="predMadre" class="my-auto text-sm font-medium text-gray-900 ">Pred Padre:</label>
                                                            </div>
                                                            <div class="flex flex-col gap-2 items-end">
                                                                <input type="text" name="codMadre" id="codMadre" class="w-16 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Cod_Padres}} @endisset {{old('codMadre')}}" disabled="true">                                                                    
                                                                <input type="text" name="nomMadre" id="nomMadre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Nomb_Padres}} @endisset {{old('nomMadre')}}"   >
                                                                <input type="text" name="dniMadre" id="dniMadre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Dni_Padres}} @endisset {{old('dniMadre')}}"   >
                                                                <input type="text" name="domiMadre" id="domiMadre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Domi_Padres}} @endisset {{old('domiMadre')}}"   >
                                                                <div class="flex gap-1">
                                                                    <input type="text" name="cposMadre" id="cposMadre" class="justify-self-end w-14 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->CPos_Padres}} @endisset {{old('cposMadre')}}"   >
                                                                    -
                                                                    <input type="text" name="poblMadre" id="poblMadre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Pobl_Padres}} @endisset {{old('poblMadre')}}"   >
                                                                </div>
                                                                <input type="text" name="provMadre" id="provMadre" class="justify-self-end w-52 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Prov_Padres}} @endisset {{old('provMadre')}}"  >
                                                                <div class="flex gap-1">
                                                                    <input type="text" name="telfMadre" id="telfMadre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Tfn1_Padres}} @endisset {{old('telfMadre')}}"   >
                                                                    -
                                                                    <input type="text" name="telf2Madre" id="telf2Madre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Tfn2_Padres}} @endisset {{old('telf2Madre')}}"   >
                                                                </div>
                                                                <input type="text" name="emailMadre" id="emailMadre" class="justify-self-end w-80 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Emai_Padres}} @endisset {{old('emailMadre')}}"   >
                                                                <input type="text" name="variosMadre" id="variosMadre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Varios_Padres}} @endisset {{old('variosMadre')}}"   >
                                                                <input type="text" name="predMadre" id="predMadre" class="justify-self-end w-24 border-2 rounded p-0 border-stone-500 text-right " value="@isset($madre){{$madre->Pred_Padres}} @endisset {{old('predMadre')}}"   >
                                                            </div>                                                
                                                        </div>

                                                        <div class="flex flex-col items-center gap-2">
                                                            
                                                            @error('nomMadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                            
                                                        
                                                            @error('dniMadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                    
                                                        
                                                            @error('domiMadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                   
                                                                                        
                                                            @error('cposMadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                               
                                                            @error('poblMadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                     
                                                        
                                                            @error('provMadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                     
                                                        
                                                            @error('telfMadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                                    
                                                        
                                                            @error('emailMadre')
                                                                <div class="bg-red-600 whitespace-nowrap text-white  rounded-xl text-sm p-1 text-center">{{ $message }}</div>
                                                            @enderror                                
                                                                                       
                                                        </div>

                                                        <button id="saveMadre" type="button" class="w-fit self-center text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-modal-hide="madre-modal">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>                                                                                         
                            </div>
                        </div>                        
                    </div>             
                    
                    <div>
                        <input type="checkbox" name="desc" id="desc" class="border-2 p-0 border-stone-500" @isset($persona)@if($persona->Desc_Personas != null) checked @endif @endisset @checked(old('desc')) @if(isset($persona))disabled="true"@endif> 
                        <label for="desc">Descatalogado</label>                     
                    </div>
                    <div>
                        <label for="fdesc">Fecha Descatalogado:</label>
                        <input type="date" name="fdesc" id="fdesc" class="w-32 border-2 rounded p-0 border-stone-500 text-right ml-32" value="@isset($persona){{$persona->FDes_Personas}}@endisset{{old('fdesc')}}" @if(isset($persona))disabled="true"@endif>    
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <label for="mdesc">Motivo Descatalogado:</label>                   
                        <textarea name="mdesc" id="mdesc" cols="5" rows="5" class="w-96 rounded" @if (isset($persona))disabled="true"     
                        @endif>@isset($persona){{$persona->MBaj_Personas}}@endisset{{old('mdesc')}}</textarea>   
                    </div>
                    <div class="mt-2 self-center">
                        <button class="border rounded p-1 px-2 shadow bg-blue-600 hover:bg-gray-700 text-white font-medium" type="submit" name="nuevoUsu" id="nuevoUsu" @if (isset($persona))hidden      
                        @endif>Crear Afiliado</button>
                    </div>    
                </div>
            </form>
        </div>
    
    <script type="text/javascript">
        var message = @if (isset($message))$message @endif;        
    </script>
    
@endsection