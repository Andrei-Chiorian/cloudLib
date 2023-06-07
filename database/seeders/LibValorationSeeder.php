<?php

namespace Database\Seeders;

use App\Models\Lib_valoration;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LibValorationSeeder extends Seeder
{
    public function run(): void
    {
        $libVal = new Lib_valoration();
        
        $libVal->user_id = 1;
        $libVal->library_id = 2;
        $libVal->comment = 'Muy buena biblioteca';
        $libVal->stars = 5;        

        $libVal->save();

        $libVal2 = new Lib_valoration();
        
        $libVal2->user_id = 2;
        $libVal2->library_id = 1;
        $libVal2->comment = 'Vaya mierda';
        $libVal2->stars = 1;       

        $libVal2->save();

    }
}