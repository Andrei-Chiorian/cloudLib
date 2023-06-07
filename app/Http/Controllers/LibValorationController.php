<?php

namespace App\Http\Controllers;

use App\Models\Lib_valoration;
use App\Models\Library;
use Illuminate\Http\Request;

class LibValorationController extends Controller
{
    public function store(Request $request)
    {   
        Lib_valoration::create([            
            'user_id'=>  auth()->user()->id,
            'library_id'=>  $request->library_id,      
        ]);
        return back();
    }

    public function destroy(Request $request)
    {
        
        $request->user()->likes()->where('library_id', $request->library_id)->delete();
        return back();
    }
}
