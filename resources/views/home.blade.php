@push('jquery')
<script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
@endpush

@extends('layouts.app')
@section('titulo')
    {{auth()->user()->username}} &#8226; CloudLib
@endsection
@section('contenido')
@auth
    <div class="mx-auto px-5">
        <div class="rounded p-3 shadow bg-white mb-3 flex gap-1 font-semibold text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
              
            Pagina principal            
        </div>
        <div class="flex gap-5 justify-center">
            <div class="w-2/3 rounded p-3 shadow bg-white mb-3 ">
                <div class="overflow-y-scroll scrollbar-hide max-h-screen min-h-screen">
                    <div class="text-center font-bold text-2xl">
                        Bibliotecas de {{auth()->user()->username}}
                    </div>
                    
                    <div class="grid mt-16 ">                         
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 items-center w-fit">                    
                            <a class="cursor-pointer text-center" href="{{route('library.create')}}">
                                <div class="hover:shadow-black hover:shadow-lg hover:scale-105 border-4 rounded-lg flex items-center justify-center">                            
                                    <div class="w-full">                         
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-36">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                        </svg>                
                                        <p class="font-semibold text-xl bg-neutral-200">Añadir Biblioteca</p>                                                       
                                    </div>                
                                </div>
                            </a>                     
                            
                            @if ($libraries->count())  
                                @foreach ( $libraries as $library )
                                    <div class="hover:shadow-black hover:shadow-lg hover:scale-105 border-4 rounded-lg">
                                        <a class="cursor-pointer flex-col text-center" href="{{route('library.index', ['library'=>$library])}}">
                                            <img src="img/biblioteca.png" alt="Imagen de biblioteca">
                                            <div>
                                                <p class="font-semibold text-lg bg-neutral-200">{{$library->name}}</p>
                                            </div>
                                            <div>
                                                <p class="bg-neutral-200">{{$library->start_date}}</p>
                                            </div>
                                        </a>
                                    </div>                    
                                @endforeach
                                <div class="my-10">
                                    {{$libraries->links('pagination::tailwind')}}
                                </div>            
                            @endif     
                        </div>
                    </div>                                 
                </div>
            </div>
            <div class="w-1/3 overflow-y-auto scrollbar-hide rounded p-3 shadow bg-white mb-3 ">
                <div class=" text-center p-1 text-lg font-medium text-gray-600">
                    Descubre Bibliotecas
                    <hr class="mt-5 border-1 border-gray-800 mx-7">
                    <div class="mt-5" >                
                        @foreach ($allLibraries as $library)
                            @if($library->state == 'on')
                                <a href="{{route('library.index', ['library'=>$library])}}">
                                    <div class="flex w-full items-center gap-1">
                                        <div class="font-bold">
                                            {{$library->name}}
                                        </div>
                                        &#8226;
                                        <div>
                                            {{$library->user->username}}
                                        </div>
                                        <div class="ml-auto flex gap-1 items-center">                             
                                            @if ($library->likes->count())
                                                <div>
                                                    {{$library->likes->count()}}                               
                                                </div>
                                            @else
                                                <div>
                                                    0                              
                                                </div>
                                            @endif
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="0" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>                                    
                                        </div>
                                    </div>
                                </a>
                            @endif    
                        @endforeach                
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth    
@endsection

