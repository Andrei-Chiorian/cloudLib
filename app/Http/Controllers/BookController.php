<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;



class BookController extends Controller
{
    public function index(Library $library, Book $book){  
        
        return view('books.bookIndex', ['library'=>$library, 'book'=>$book]);
    }

    public function create(Library $library){
        
        return view('books.book',['library'=>$library]);
    }

    public function store(Request $request){
        
        $this->validate($request, [                       
            'name'=>'required',
            'author'=>'required',
            'editorial'=>'nullable',
            'synopsis'=>'nullable',
            'page_num'=>'nullable',
            'book_coud'=>'nullable',
            'obser'=>'nullable',
            'image'=>'nullable',
            'image'=>'nullable',             
            'valoration'=>'nullable',          
        ]);

        if ($request->image) {
            $image = $request->file('image');            
           
            $nomImage1 = Str::uuid() . "." . $image[0]->extension();            
            
            $imgServ1 = Image::make($image[0]);
            $imgServ1->fit(400,500,);           
            $imgServ1->orientate();

            $imgPath1 = public_path('books') . '/' . $nomImage1;            
            $imgServ1->save($imgPath1);                           
                        
            if(isset($request->image[1])){
                $nomImage2 = Str::uuid() . "." . $image[1]->extension();
                $imgServ2 = Image::make($image[1]);
                $imgServ2->fit(400,500,);
                $imgServ2->orientate();
                $imgPath2 = public_path('books') . '/' . $nomImage2;
                $imgServ2->save($imgPath2);  
            }else{
                $nomImage2 = null;  
            }

        }else{
            $nomImage1 = null;
            $nomImage2 = null; 
        }
        
        Book::create([
            'name'=>$request->name,
            'author'=>$request->author,
            'editorial'=>$request->editorial,
            'synopsis'=>$request->synopsis,
            'page_num'=>$request->page_num,
            'book_cond'=>$request->book_cond,
            'obser'=>$request->obser,
            'image'=>$nomImage1,
            'image2'=>$nomImage2 ,             
            'valoration'=>$request->star,
            'library_id'=>$request->library, 
        ]);

        $library = Library::where('id', $request->library)->first();
           
        return redirect()->route('library.index', ['library'=>$library]);
    }

    public function destroy(Request $request){
        Book::where('id', $request->id)->delete();
        $library = Library::where('id', $request->library_id)->first();
        
        return redirect()->route('library.index', ['library'=>$library]);
    }

    public function update(){
        
    }
}
