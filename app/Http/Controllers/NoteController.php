<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [                       
            'text' => 'required',            
        ]);

        Note::create([
            'text' => $request->text,
            'book_id' => $request->id
        ]);

        return back();
    }

    public function destroy(Request $request){
        Note::where('id', $request->id)->delete();
        return back();
    }
}
