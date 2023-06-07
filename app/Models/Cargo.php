<?php

namespace App\Models;

use App\Models\Socio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = 
    [               
        'Cod_Cargos',
        'Desc_Cargos'        
    ];

    public function socio(){
        $this->hasMany(Socio::class, 'Carg_Socios');
    }
}
