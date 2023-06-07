<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Library;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function __invoke()
    {   
        if (auth()->user()) {                       
            $libraries = Library::whereIn('user_id', auth()->user())->latest()->paginate(10);
            $allLibraries = Library::whereNotIn('user_id', [auth()->user()->id])->get();               
            
            return view('home',['libraries' => $libraries, 'allLibraries'=>$allLibraries]);
            
        }

        return redirect('login');
    }
   
}
