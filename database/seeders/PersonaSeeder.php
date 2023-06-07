<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persona = new Persona();

        $persona->Hue1_Personas = 'Hue';
        $persona->Obse_Personas = 'Obse';
        $persona->Apel_Personas = 'Chiorian';
        $persona->Nomb_Personas = 'Andrei';
        $persona->FNac_Personas = '1993-10-23';
        $persona->NFot_Personas = 'imagen.png';
        $persona->Dni_Personas = 'y0225433f';
        $persona->Domi_Personas = 'c/spagueti 5';
        $persona->CPos_Personas = 28017;
        $persona->Pobl_Personas = 'Madrid';
        $persona->Prov_Personas = 'Madrid';
        $persona->Tfn1_Personas = 636021791;
        $persona->Tfn2_Personas ;
        $persona->Emai_Personas = 'achiorian23@yahoo.com';
        $persona->CPad_Personas ;
        $persona->CMad_Personas ;
        $persona->FAlt_Personas = '2023-10-23';
        $persona->CGru_Personas = '';
        $persona->Desc_Personas = 'on';
        $persona->FDes_Personas = '2023-05-08';
        $persona->MBaj_Personas = 'Estaba cansado';
        $persona->Lopd_Personas = 'on';

        $persona->save();


        $persona1 = new Persona();

        $persona1->Hue1_Personas = 'Hue1';
        $persona1->Obse_Personas = 'Obse1';
        $persona1->Apel_Personas = 'Chiorian';
        $persona1->Nomb_Personas = 'Irina';
        $persona1->FNac_Personas = '1996-01-17';
        $persona1->NFot_Personas = 'imagen1.png';
        $persona1->Dni_Personas = 'y0459277t';
        $persona1->Domi_Personas = 'c/spagueti 5';
        $persona1->CPos_Personas = 28017;
        $persona1->Pobl_Personas = 'Madrid';
        $persona1->Prov_Personas = 'Madrid';
        $persona1->Tfn1_Personas = 636548962;
        $persona1->Tfn2_Personas ;
        $persona1->Emai_Personas = 'airina23@yahoo.com';
        $persona1->CPad_Personas ;
        $persona1->CMad_Personas ;
        $persona1->FAlt_Personas = '2023-01-02';
        $persona1->CGru_Personas = '';
        $persona1->Desc_Personas ;
        $persona1->FDes_Personas ;
        $persona1->MBaj_Personas ;
        $persona1->Lopd_Personas = 'on';

        $persona1->save();


        $persona2 = new Persona();

        $persona2->Hue1_Personas = 'Hue2';
        $persona2->Obse_Personas = 'Obse2';
        $persona2->Apel_Personas = 'Ernesto';
        $persona2->Nomb_Personas = 'Mejillon';
        $persona2->FNac_Personas = '1967-06-25';
        $persona2->NFot_Personas = 'imagen.png';
        $persona2->Dni_Personas = 'y0225433f';
        $persona2->Domi_Personas = 'c/macarron 18';
        $persona2->CPos_Personas = 16460;
        $persona2->Pobl_Personas = 'Barajas de melo';
        $persona2->Prov_Personas = 'Cuenca';
        $persona2->Tfn1_Personas = 675489322;
        $persona2->Tfn2_Personas = 648555222;
        $persona2->Emai_Personas = 'ernesto@yahoo.com';
        $persona2->CPad_Personas ;
        $persona2->CMad_Personas ;
        $persona2->FAlt_Personas = '2023-03-15';
        $persona2->CGru_Personas ;
        $persona2->Desc_Personas ;
        $persona2->FDes_Personas ;
        $persona2->MBaj_Personas ;
        $persona2->Lopd_Personas ;
    
        $persona2->save();
    }
}
