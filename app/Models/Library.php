<?php

namespace App\Models;

use App\Models\Lib_valoration;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
   use HasFactory;

   protected $fillable = [
      'name',
      'desc',
      'start_date',
      'user_id',
      'state'       
   ];

   public function user(){
      return $this->belongsTo(User::class);
   }

   public function books(){
      return $this->hasMany(Book::class);
   }

   public function loans(){
      return $this->through('books')->has('loans');
   }

   public function likes(){
      return $this->hasMany(Lib_valoration::class);
   }

   public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', auth()->user()->id);
    }
}
