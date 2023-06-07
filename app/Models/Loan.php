<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory;

    protected $fillable=[
        'person',
        'checkout',
        'checkinPrev',
        'checkin',
        'obser',
        'book_id'
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function daysLast($date)
    {
        $checkin = new Carbon($date);

        return $checkin->diffInDays(now());
    }

    public function today()
    {
        $today = new Carbon();
        return $today->now();
    }
}
