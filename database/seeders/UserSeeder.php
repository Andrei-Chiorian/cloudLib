<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();

        $user->username = 'Karamazan';
        $user->name = 'Mi nueva libreria llena de libros y recuerdos, contiene la especielmente libros de novela policiaca aventuras y clasicos ';
        $user->desc = 'Nuevo lector apasionado';
        $user->surname = 'on';
        $user->image = '601613a6-4dc3-44f7-8613-6c5c21190158.jpg';
        $user->email = 'heavy_andre@yahoo.es';
        $user->password = '$2y$10$/EZhM7dKm3c4gXfuxxZdKO8t.utdvnyO5CFqXB/zk5XfKZFbtMK.6';

        $user->save();

        $user2 = new User();

        $user2->username = 'Gorbachov';
        $user2->name = 'Ruper';
        $user2->desc = 'Gran lector de clasicos';
        $user2->surname = 'Truper';
        $user2->image = '601613a6-4dc3-44f7-4805-6c5c21190158.jpg';
        $user2->email = 'ruper@yahoo.es';
        $user2->password = '$2y$10$/EZhM7dKm3c4gXfuxxZdKO8t.utdvnyO5CFqXB/zk5XfKZFbtMK.6';

        $user2->save();
    }
}