<?php

namespace App\Models;

use App\Models\Padre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = 
    [               
        'Hue1_Personas',
        'Obse_Personas',
        'Apel_Personas',
        'Nomb_Personas',
        'FNac_Personas',
        'NFot_Personas',
        'Dni_Personas',
        'Domi_Personas',
        'CPos_Personas',
        'Pobl_Personas',
        'Prov_Personas',
        'Tfn1_Personas',
        'Tfn2_Personas',
        'Emai_Personas',
        'CPad_Personas',
        'CMad_Personas',
        'FAlt_Personas',
        'CGru_Personas',
        'FDes_Personas',
        'MBaj_Personas',
        'Lopd_Personas',
    ];


    public function padre()
    {
        return $this->hasOne(Padre::class, 'Cod_Padres', 'CPad_Personas');
    }

    public function padre_1()
    {
        return $this->hasOne(Padre_1::class, 'Cod_Padres', 'CMad_Personas');
    }

    public function socio()
    {
        return $this->hasMany(Socio::class, 'CPer_Socios');
    }
}
