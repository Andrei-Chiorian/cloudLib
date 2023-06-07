@extends('layouts.app')

@section('titulo')
    Añadir Libro &#8226; {{$library->name}} &#8226; CloudLib
@endsection

@section('contenido')
    <div class="md:flex justify-center mt-10 md:gap-4 md:items-center ">
             
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">Titulo</label>
                    <input type="text" id="name" name="name" placeholder="Introduce el titulo" value="{{old('name')}}" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"/>
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="author" class="mb-2 block uppercase text-gray-600 font-bold">Autor</label>
                    <input type="text" id="author" name="author" placeholder="Introduce el autor" value="{{old('author')}}" class="border p-3 w-full rounded-lg @error('author') border-red-500 @enderror"/>
                    @error('author')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="editorial" class="mb-2 block uppercase text-gray-600 font-bold">Editorial</label>
                    <input type="text" id="editorial" name="editorial" placeholder="Introduce la editorial" value="{{old('editorial')}}" class="border p-3 w-full rounded-lg @error('editorial') border-red-500 @enderror"/>
                    @error('editorial')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>                

                <div class="mb-5 ">
                    <label for="synopsis" class="mb-2 block uppercase text-gray-600 font-bold">Sinopsis</label>                    
                    <textarea id="synopsis" name="synopsis" placeholder="Introduce la sinopsis" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">{{old('synopsis')}}</textarea>                    
                    @error('synopsis')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="page_num" class="mb-2 block uppercase text-gray-600 font-bold">Numero de paginas</label>
                    <input type="text" id="page_num" name="page_num" placeholder="Introduce el numero de paginas" value="{{old('page_num')}}" class="border p-3 w-full rounded-lg @error('page_num') border-red-500 @enderror"/>
                    @error('page_num')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">                    
                    <div for="book_cond" class="mb-2 block uppercase text-gray-600 font-bold">Estado del libro</div>
                    <div class="mb-5 text-gray-500">
                        <p>A continuación elige una de las siguientes opciones en funcion del estado en el que se encuentra el libro: <br>-Muy bueno: libros nuevos o en perfecto estado <br>-Bueno: algun pequeño defecto <br>-Malo: defectos visibles a simple vista <br>-Muy malo: defectos graves como falta de tapas</p>
                    </div>                    
                    <input type="radio" id="muymalo" name="book_cond" value="Muy malo"/>
                    <label for="muymalo">Muy malo</label>
                    <input type="radio" id="malo" name="book_cond" value="Malo"/>
                    <label for="malo">Malo</label>
                    <input type="radio" id="bueno" name="book_cond" value="Bueno"/>
                    <label for="bueno">Bueno</label>
                    <input type="radio" id="muybueno" name="book_cond" value="Muy bueno"/>
                    <label for="muybueno">Muy bueno</label>
                    @error('book_cond')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">                    
                    <textarea id="obser" name="obser" placeholder="Describe los daños del libro" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">{{old('obser')}}</textarea>                    
                    @error('obser')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-600 font-bold">Portada y Contraportada</label>
                    <div class="mb-5 text-gray-500">
                        <p>Adjunta la portada, la contraportada o ambas, primero la portada</p>
                    </div> 
                    <input type="file" id="image" name="image[]" placeholder="Introduce el nombre de tu biblioteca" value="{{old('image')}}" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" accept=".jpg, .jpeg, .png" multiple/>
                    @error('image')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">                    
                    <div class="mb-2 block uppercase text-gray-600 font-bold">Valoracion</div>
                    <div class="mb-5 text-gray-500">
                        <p>Por ultimo puntua el libro segun tu opinion</p>
                    </div>
                    <div class="rating flex flex-row-reverse justify-end gap-2">                    
                        <input type="radio" id="star5" name="star" value="5" class="hidden"/>
                        <label for="star5" class="fas fa-star  text-gray-200"></label>
                        <input type="radio" id="star4" name="star" value="4" class="hidden" />
                        <label for="star4" class="fas fa-star text-gray-200 star"></label>
                        <input type="radio" id="star3" name="star" value="3" class="hidden" />
                        <label for="star3" class="fas fa-star text-gray-200 star"></label>
                        <input type="radio" id="star2" name="star" value="2" class="hidden" />
                        <label for="star2" class="fas fa-star text-gray-200 star"></label>
                        <input type="radio" id="star1" name="star" value="1" class="hidden" />
                        <label for="star1" class="fas fa-star text-gray-200 star"></label>
                     </div>
                    @error('book_cond')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>           
                
                <input type="hidden" name="library" value="{{$library->id}}">

                <input type="submit" value="Añadir Libro" class="bg-sky-600 hover:bg-sky-700 mt-5 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

@endsection