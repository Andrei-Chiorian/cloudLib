<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable=[
        'text',
        'book_id'
    ];

    public function book(){
       return $this->belongsTo(Book::class);
    }
}
