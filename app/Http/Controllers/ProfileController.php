<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\Print_;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Contracts\Service\Attribute\Required;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profiles.profile');
    }

    public function store(Request $request)
    {
        //$request->request->add(['username'=>Str::slug($request->username)]);
        
        $this->validate($request, [
            'name' => 'nullable|max:30' ,
            'surname' => 'nullable|max:30' ,
            'username' => [
                'required',
                'unique:users,username,'.auth()->user()->id, 
                'min:3',
                'max:20'
            ],
            'desc' => 'nullable|max:150' ,
            'email' => 'required|max:60|unique:users,email,'.auth()->user()->id,                       
        ]);          

        $usuario = User::find(auth()->user()->id);
        $usuario->name = $request->name;
        $usuario->surname = $request->username;
        $usuario->username = $request->username;
        $usuario->desc = $request->desc;
        $usuario->email = $request->email;        
        $usuario->save();              
        
        return redirect()->route('home');
    }
}
