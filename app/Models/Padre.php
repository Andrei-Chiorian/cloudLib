<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    use HasFactory;

    protected $fillable = 
    [               
        'Nomb_Padres',
        'Dni_Padres',
        'Domi_Padres',
        'CPos_Padres',
        'Pobl_Padres',
        'Prov_Padres',
        'Tfn1_Padres',
        'Tfn2_Padres',
        'Emai_Padres',
        'Varios_Padres',
        'Pred_Padres'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
