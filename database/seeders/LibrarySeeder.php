<?php

namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LibrarySeeder extends Seeder
{
    public function run(): void
    {
        $library = new Library();

        $library->name = 'Mi Libreria';
        $library->desc = 'Mi nueva libreria llena de libros y recuerdos, contiene la especielmente libros de novela policiaca aventuras y clasicos ';
        $library->start_date = '1993-10-23';
        $library->state = 'on';
        $library->user_id = 1;

        $library->save();

        $library2 = new Library();

        $library2->name = 'Mi Segunda Libreria';
        $library2->desc = 'Mi segunda libreria llena de polvo, contiene la especielmente libros de novela epica ';
        $library2->start_date = '2005-11-15';
        $library2->state = 'on';
        $library2->user_id = 2;

        $library2->save();
    }
}

