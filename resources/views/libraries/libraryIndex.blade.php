@extends('layouts.app')

@section('titulo')
    {{$library->name}} &#8226; CloudLib
@endsection

@section('contenido')

    <div class="flex flex-col justify-center items-center w-96 mx-auto gap-3 my-10">
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
                        <button type="submit">
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
                        <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" data-dropdown-placement="top" class="font-medium hover:text-gray-600 text-lg text-center inline-flex items-center" type="button">{{$library->likes->count()}} @choice('Like|Likes', $library->likes->count())</button>
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
                    <a href="">
                        <button type="button" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 transition-colors text-white font-semibold rounded shadow border w-20 px-2">Editar</button>
                    </a>    
                    
                    <form action="{{route('library.destroy')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{$library->id}}">                          
                        <button type="submit" class="bg-gradient-to-r from-red-400 to-red-600 hover:bg-gradient-to-r hover:from-red-500 hover:to-red-700 transition-colors text-white font-semibold rounded shadow border w-20 px-2">Eliminar</button>                                                        
                    </form>                                            
                @endif                    
            @endauth
        </div>
        <div class="text-center font-semibold">
            <p class=" text-xl text-gray-500">Descripcion</p>
            <p>{{$library->desc}}</p>            
        </div>
        <div class="text-center font-semibold">
            <p class=" text-xl text-gray-500">Creada por <span class="text-black">{{$library->user->username}}</span> el dia</p>
            <p>{{$library->start_date}}</p>
            
        </div>
        @auth
        <div class="text-gray-500 font-semibold">
            @if ($library->state == 'on')
                Esta biblioteca es publica
            @else
                Esta biblioteca es privada
            @endif
        </div>
        @endauth  
    </div>
    <hr class="border-2">
    <section class="container px-10 mx-auto mt-14">
        
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4 items-center">
            @if ($library->user_id == auth()->user()->id)
                <a class="cursor-pointer" href="{{route('book.create', ['library'=>$library])}}">
                    <div class="hover:shadow-black hover:shadow-lg hover:scale-105 rounded-lg border-4 flex items-center justify-center text-center">
                        <div class="w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-36">
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
    
@endsection