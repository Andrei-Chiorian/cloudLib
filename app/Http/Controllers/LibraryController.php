<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(Library $library){
        $books= Book::where('library_id',$library->id)->latest()->paginate(20);
        return view('libraries.libraryIndex', ['library'=>$library, 'books'=>$books]);
    }

    public function create(){        
        return view('libraries.library');
    }

    public function store(Request $request){
        $this->validate($request, [                       
            'name'=>'required',
            'desc'=>'nullable',
            'start_date'=>'required',
            'state'=>'required',
        ]);

        Library::create([
            'name'=> $request->name,          
            'desc'=> $request->desc,
            'start_date'=> $request->start_date,
            'state'=> $request->state,
            'user_id'=>  auth()->user()->id
        ]);

        return redirect()->route('home');
    }

    public function destroy(Request $request){
        Library::where('id', $request->id)->delete();
        return redirect()->route('home');
    }

    public function update(){
        
    }
}
