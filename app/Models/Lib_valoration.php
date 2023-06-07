<?php

namespace App\Models;

use App\Models\User;
use App\Models\Library;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lib_valoration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'library_id'
    ];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }    


}
