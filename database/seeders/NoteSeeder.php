<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        $note = new Note();
        
        $note->text = 'El capitulo tres cuando dice que el canario se fumo el porro tienes una metafora';
        $note->book_id = 1;               

        $note->save();
    }
}