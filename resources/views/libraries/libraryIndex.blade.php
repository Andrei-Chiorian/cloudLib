@extends('layouts.app')

@section('titulo')
    {{$library->name}} &#8226; CloudLib
@endsection

@section('contenido')
    <div class="mx-auto px-5">
        <div class="rounded p-3 shadow bg-white bg-opacity-40 mb-3 font-semibold">    
            <a href="{{route('home')}}">
                <button class="w-fit text-blue-950 hover:text-blue-800 hover:scale-105 font-semibold flex gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                    </svg>              
                    Volver a la pagina principal
                </button>
            </a>
        </div>
        <div class="rounded p-3 shadow mb-3 bg-fixed font-semibold"  style="background-image: url('/img/backgroundLib.jpg'); height: 400px">
            <div class="flex flex-col justify-center items-center w-96 mx-auto gap-3 my-10 bg-slate-600 bg-opacity-50 rounded-xl text-white">
                <div class="text-2xl font-bold">
                    Biblioteca {{$library->name}}
                </div>
                <div class="flex gap-1">
                    @auth                          
                        @if ($library->checkLike(auth()->user()))
                        
                            <form action="{{route('likes.destroy')}}" method="post" class="flex items-center">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="library_id" value="{{$library->id}}">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-red-600 stroke-red-600 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{route('likes.store')}}" method="post" class="flex items-center">
                                @csrf
                                <input type="hidden" name="library_id" value="{{$library->id}}">
                                <button type="submit" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:fill-red-600 hover:stroke-red-600 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                    </svg>
                                </button>
                            </form>
                        @endif                               
                    @endauth
                    <div>
                        @if ($library->likes->count())
                            <div class="items-center">
                                <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" data-dropdown-placement="top" class="font-medium hover:scale-105 text-lg text-center inline-flex items-center" type="button">{{$library->likes->count()}} @choice('Like|Likes', $library->likes->count())</button>
                                <!-- Dropdown menu -->
                                <div id="dropdownUsers" class="z-10 hidden rounded-lg shadow w-60 bg-gray-100">
                                    <ul class="h-48 py-2 overflow-y-auto text-gray-700" aria-labelledby="dropdownUsersButton">                                        
                                        @foreach ($library->likes as $like )                        
                                                    <li class="px-2 mb-2 cursor-default">
                                                        <div class="flex gap-3 items-center">                         
                                                            {{$like->user->username}}                                                                                                                 
                                                        </div>                                           
                                                    </li>                        
                                        @endforeach
                                    </ul>        
                                </div>                                
                            </div>  
                        @endif
                    </div>
                </div>        
                <div class="flex gap-2">
                    @auth
                        @if ($library->user_id == auth()->user()->id)
                            <a href="{{route('library.updateShow', $library)}}">
                                <button type="button" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 transition-colors text-white font-semibold rounded shadow border w-20 px-2">Editar</button>
                            </a>  
                            
                            <button class="text-center bg-gradient-to-r from-red-400 to-red-600 hover:bg-gradient-to-r hover:from-red-500 hover:to-red-700 transition-colors text-white font-semibold rounded shadow border w-20 px-2" data-modal-target="delete-library-modal" data-modal-toggle="delete-library-modal">Eliminar</button>                                           
                        @endif                    
                    @endauth
                </div>
                <div class="text-center font-semibold">
                    <p class=" text-xl text-white">Descripcion</p>
                    <p>{{$library->desc}}</p>            
                </div>
                <div class="text-center font-semibold">
                    <p class=" text-xl text-white">Creada por <span class="text-slate-50">{{$library->user->username}}</span> el dia</p>
                    <p>{{$library->start_date}}</p>
                    
                </div>
                @auth
                <div class="text-white font-semibold">
                    @if ($library->state == 'on')
                        Esta biblioteca es publica
                    @else
                        Esta biblioteca es privada
                    @endif
                </div>
                @endauth  
            </div>
        </div>
        <div class="rounded p-3 shadow bg-white bg-opacity-5  mb-3 font-semibold">
            <section class="container px-10 mx-auto mt-14">             
                <div class="grid md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4 items-center">
                    @if ($library->user_id == auth()->user()->id)
                        <a class="cursor-pointer" href="{{route('book.create', ['library'=>$library])}}">
                            <div class="hover:shadow-black hover:shadow-lg hover:scale-105 rounded-lg border-4 flex items-center justify-center text-center">
                                <div class="w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="mx-auto h-36">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>                          
                                    <p class="font-semibold text-xl bg-neutral-200">Añadir libro</p>                        
                                </div>
                            </div>
                        </a> 
                    @endif
                    @if ($books->count())  
                        @foreach ( $books as $book )
                            
                                <a class="hover:shadow-black hover:shadow-lg hover:scale-105 border-4 rounded-lg cursor-pointer text-center h-full bg-neutral-200 flex flex-col items-center justify-center" href="{{route('book.index', ['library'=>$library , 'book'=>$book])}}">
                                    @if($book->image == null)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-44">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>   
                                    @else
                                        <img class=" h-60 mx-auto" src="{{asset('books') . '/' . $book->image}}" alt="Imagen del post {{$book->name}}">
                                    @endif
                                    <p class="font-semibold text-xl bg-neutral-200">{{$book->name}}</p>
                                    <p class="font-semibold text-md bg-neutral-200">{{$book->author}}</p>
                                </a>
                                            
                        @endforeach
                        <div class="my-10">
                            {{$books->links('pagination::tailwind')}}
                        </div> 
                    @endif
                </div>
                
            </section>
        </div>
    </div> 
    {{-- Modal eliminar biblioteca --}}

    <div id="delete-library-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- contenido -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-library-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Eliminar libro</h3>

                    <form class="space-y-6" action="{{route('library.destroy')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div>
                            <p  class="my-auto text-sm font-medium text-gray-900 dark:text-white"> Si elimina esta biblioteca se perderan todos los datos asociados a ella como son los libro al igual que sus notas y prestamos.<br><br> Esta seguro que deseas eliminar el libro?</p>                            
                        </div>                                                
                       
                        <input type="hidden" name="id" value="{{$library->id}}">
                        <div class="flex flex-col gap-2">
                            <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg py-2.5 text-center uppercase dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                            <button type="button" class="bg-gradient-to-l from-gray-300 to-gray-400 hover:bg-gradient-to-l hover:from-gray-400 hover:to-gray-500 transition-colors cursor-pointer uppercase font-bold w-full py-2.5 text-white rounded-lg" data-modal-hide="delete-library-modal">Cancelar</button>
                        </div>                         
                    </form>
                </div>
            </div>
        </div>
    </div>
   
@endsection