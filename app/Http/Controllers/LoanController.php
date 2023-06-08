<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class LoanController extends Controller
{
    public function index(){
        $libraries = Library::where('user_id', auth()->user()->id)->get();        
        return view('loans.loanIndex',['libraries'=>$libraries]);
    }    

    public function create(Library $library, Book $book){           
        return view('loans.loan', ['library'=>$library, 'book'=>$book]);
    }

    public function checkin(Request $request){
        $loan = Loan::where('id', $request->id)->first();        
        $book = $request->title;
        $library = $request->library;              
        return view('loans.loanUpdate', ['loan'=>$loan, 'book'=>$book, 'library'=>$library]);
    }


    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'person'=>'required',
            'checkout'=>'required',
            'checkinPrev'=>'required',            
            'obser'=>'nullable',
            'book_id'=>'required',
        ]);        

        Loan::create([
            'person'=>$request->person,
            'checkout'=>$request->checkout,
            'checkinPrev'=>$request->checkinPrev,
            'obser'=>$request->obser,
            'book_id'=>$request->book_id,
        ]);

        $book = Book::where('id', $request->book_id)->first();
        
        $library = Library::where('id', $book->library_id)->first();
        

        return redirect()->route('book.index',['library'=>$library, 'book'=>$book]);
    }


    public function update(Request $request){
        Loan::where('id', $request->id)->update([            
            'checkinPrev'=>$request->checkinPrev,
            'checkin'=>$request->checkin,
            'obser'=>$request->obser,            
        ]);

        return redirect()->route('loan.index');
    }



}
