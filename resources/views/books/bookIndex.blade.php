@extends('layouts.app')

@section('titulo')
{{$book->name}} &#8226; {{$library->name}} &#8226; CloudLib
@endsection

@section('contenido')

    <div class="mx-auto px-5 mt-5">
        <div class="rounded p-3 shadow bg-white bg-opacity-40 mb-3 font-semibold">
            <a href="{{route('library.index', $library)}}">                
                <button class="w-fit text-blue-950 hover:text-blue-800 hover:scale-105 flex gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                    </svg> 
                    Volver a la biblioteca
                </button>
            </a>            
        </div>
        
        <div class="my-5 w-full bg-fixed bg-cover" style="background-image: url('/img/book.jpeg'); height: 400px">
            <div class="flex items-center justify-center">
                <img class="shadow-2xl rounded-md border-black h-64" src="{{asset('books') . '/' . $book->image}}" alt="Imagen del post {{$book->image}}">
            </div>
            <div class="mt-5 flex-col flex justify-center items-center">
                <div class="font-bold text-2xl text-center text-white">        
                    {{$book->name}}                
                </div>
                <div class="flex gap-1 mt-3 font-bold text-2xl justify-center">        
                    @if ($book->valoration == 5)
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                    @elseif ($book->valoration == 4)
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-gray-200"></p>
    
                    @elseif ($book->valoration == 3)
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
    
                    @elseif ($book->valoration == 2)
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
    
                    @elseif ($book->valoration == 1)
                        <p class="fas fa-star text-yellow-300 [text-shadow:_0_2px_0_rgb(202_138_4/_60%)]"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
    
                    @elseif ($book->valoration == null)
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>
                        <p class="fas fa-star text-gray-200"></p>                            
                    @endif          
                </div>
            @if ($book->library->user_id == auth()->user()->id)    
                <div class="flex gap-2">
                    <a href="{{route('book.updateShow', [$library, $book])}}" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 transition-colors text-white font-semibold rounded shadow border mt-4 w-20 px-2 text-center">Editar</a>
                    <button class="text-center bg-gradient-to-r from-red-400 to-red-600 hover:bg-gradient-to-r hover:from-red-500 hover:to-red-700 transition-colors text-white font-semibold rounded shadow border mt-4 w-20 px-2" data-modal-target="delete-book-modal" data-modal-toggle="delete-book-modal">Eliminar</button>
                    @isset($book->loans)
                        <?php
                            $check = 0;
                            foreach ($book->loans as $loan) {
                                if ($loan->checkin == null) {                                        
                                    $check++;
                                }
                            }
                            if ($check == 0) {
                        ?>                              
                                <a href="{{route('loan.create', [$library, $book])}}">
                                    <button type="button" class="text-center bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 transition-colors text-white font-semibold rounded shadow border mt-4 w-20 px-2">Prestar</button>
                                </a>
                        <?php
                            }
                        ?>                                                 
                    @endisset 
                </div>
                @isset($book->loans)
                    @foreach ($book->loans as $loan)
                        @if($loan->checkin == null)
                            <div class="font-semibold text-lg text-red-700">
                                Prestado
                            </div>
                            @break                   
                        @endif
                    @endforeach                        
                @endisset
            @endif
            </div>
        </div>

        <div class=" rounded p-3 shadow bg-white bg-opacity-5">    
            <div class="flex gap-10 mt-10 text-white">
                <div class="flex gap-2 items-center">
                    <p class="font-semibold text-lg">
                        Autor: 
                    </p>
                    <p>
                        {{$book->author}}
                    </p>
                </div>
                <div class="flex gap-2 items-center">
                    <p class="font-semibold text-lg">
                        Editorial: 
                    </p>
                    <p>
                        {{$book->editorial}}
                    </p>
                </div>
                <div class="flex gap-2 items-center">
                    <p class="font-semibold text-lg">
                        Nº Paginas: 
                    </p>
                    <p>
                        {{$book->page_num}}
                    </p>
                </div>               
            </div>

            <div class="grid-cols-2 mt-6 gap-3 items-center text-white">
                <div class="font-semibold text-lg">
                    Sinopsis:
                </div>
                <p class="break-words">
                    {{$book->synopsis}}Una de las novelas más importantes de todos los tiempos y para muchos la obra definitiva de la literatura española. Escrita por Miguel de Cervantes (1547-1616) y publicada entre 1605 y 1615, narra las aventuras del ingenioso hidalgo Don Quijote de la Mancha (llamado realmente Alonso Quijano), en su misión personal de enmendar entuertos en donde los hubiere, acompañado de su fiel escudero, y amigo Sancho Panza. Nacida del amor de su autor por la novela caballeresca, Don Quijote se convirtió en una oda a ese particular estilo y en una crítica mordaz y humorística 
                </p>
            </div>

            <div class="flex mt-6 gap-3 items-center text-white">
                <div class="font-semibold text-lg">
                    Estado del libro:
                </div>
                <p class="break-words">
                    {{$book->book_cond}}
                </p>                
            </div>

            <div class="grid-cols-2 mt-3 gap-3 items-center text-white">
                <div class="font-semibold text-base">
                    Observaciones:
                </div>
                <p class="break-words">
                    {{$book->obser}} Una de las tapas esta deteriorada en la esquina iferior izquierda
                </p>                
            </div>         
            @if ($book->library->user_id == auth()->user()->id) 
                <div class="grid-cols-2 mt-3 gap-3 items-center text-white">
                    
                    <div class="font-semibold text-lg">
                        Notas
                    </div>
                    <div class="flex justify-end mb-1 mr-2">                     
                        <button class="bg-gradient-to-r from-cyan-500 to-blue-500 rounded shadow border w-fit px-2" data-modal-target="add-note-modal" data-modal-toggle="add-note-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>                    
                    </div>                    
                
                    @foreach ($book->notes as $note)
                        <div class="break-words border rounded p-2 mb-1">
                            <div class="font-semibold flex">
                                <p class="">{{$note->created_at->diffForHumans()}}</p>
                                <button class="bg-gradient-to-r from-red-400 to-red-600 rounded shadow border ml-auto w-fit  px-2" data-modal-target="delete-note-modal" data-modal-toggle="delete-note-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                                  
                                </button> 
                            </div>
                            <p class="break-words">
                            {{$note->text}}
                            </p>                            
                        </div>

                        {{-- Modal eliminar nota --}}

                        <div id="delete-note-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- contenido -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-note-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>

                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-2xl font-medium text-gray-900 dark:text-white">Eliminar nota</h3>

                                        <form class="space-y-6" action="{{route('note.destroy')}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div>
                                                <p class="my-auto font-medium text-gray-900 dark:text-white">Esta seguro que deseas eliminar la nota?</p>                            
                                            </div>                                                                                  
                                        <input type="hidden" name="id" value="{{$note->id}}">
                                        <div class="flex flex-col gap-2">
                                            <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg py-2.5 text-center uppercase dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                                            <button type="button" class="bg-gradient-to-l from-gray-300 to-gray-400 hover:bg-gradient-to-l hover:from-gray-400 hover:to-gray-500 transition-colors cursor-pointer uppercase font-bold w-full py-2.5 text-white rounded-lg" data-modal-hide="delete-note-modal">Cancelar</button>
                                        </div>                       
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach                             
                </div>
            @endif
        </div>

    </div>



    {{-- Modal eliminar libro --}}

    <div id="delete-book-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- contenido -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-book-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-2xl font-medium text-gray-900 dark:text-white">Eliminar libro</h3>

                    <form class="space-y-6" action="{{route('book.destroy')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div>
                            <p  class="my-auto font-medium text-gray-900 dark:text-white"> Si elimina este libro se perderan todos los datos asociados a el como son las notas y prestamos<br><br> Esta seguro que deseas eliminar el libro?</p>                            
                        </div>                                                              
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <input type="hidden" name="library_id" value="{{$book->library_id}}">
                        <div class="flex flex-col gap-2">
                            <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg py-2.5 text-center uppercase dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                            <button type="button" class="bg-gradient-to-l from-gray-300 to-gray-400 hover:bg-gradient-to-l hover:from-gray-400 hover:to-gray-500 transition-colors cursor-pointer uppercase font-bold w-full py-2.5 text-white rounded-lg" data-modal-hide="delete-book-modal">Cancelar</button>
                        </div>                         
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- Modal añadir nota --}}


    <div id="add-note-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- contenido -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="add-note-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-2xl font-medium text-gray-900 dark:text-white">Añade una nota</h3>
                    <form class="space-y-6" action="{{route('note.store')}}" method="POST">                        
                        @csrf
                        <div class="flex gap-3">
                            <textarea name="text" id="text" cols="60" rows="10" class="border rounde shadow" placeholder="Escribe aqui tu nota"></textarea>
                            <input type="hidden" name="id" value="{{$book->id}}">                            
                        </div>                                                              
                        <div class="flex flex-col gap-2">
                            <button type="submit" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 transition-colors cursor-pointer uppercase font-bold w-full py-2.5 text-white rounded-lg">Añadir nota</button>                                          
                            <button type="button" class="bg-gradient-to-l from-gray-300 to-gray-400 hover:bg-gradient-to-l hover:from-gray-400 hover:to-gray-500 transition-colors cursor-pointer uppercase font-bold w-full py-2.5 text-white rounded-lg" data-modal-hide="add-note-modal">Cancelar</button>            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



   

@endsection