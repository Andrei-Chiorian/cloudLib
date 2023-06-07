<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\LibrarySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(LibrarySeeder::class);
        $this->call(BookSeeder::class);
        //$this->call(LibValorationSeeder::class);
        //$this->call(NoteSeeder::class);
        //$this->call(LoanSeeder::class);
        
    }
}
