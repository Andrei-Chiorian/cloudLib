<?php

namespace App\Models;

use App\Models\Loan;
use App\Models\Note;
use App\Models\Library;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'editorial',
        'synopsis',
        'page_num',
        'book_cond',
        'obser',
        'image',
        'image2',
        'valoration',        
        'library_id',         
    ];

    public function library(){
       return $this->belongsTo(Library::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }
}
