<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $loan = new Loan();
        
        $loan->person = 'Julio';
        $loan->checkout = '2022-11-10';
        $loan->checkinPrev = '2022-12-12';
        $loan->checkin = '';
        $loan->obser = 'El libro estaba intacto';
        $loan->state = 'active';
        $loan->book_id = 1;

        $loan->save();

        $loan2 = new Loan();
        
        $loan2->person = 'Mario';
        $loan2->checkout = '2023-10-28';
        $loan2->checkinPrev = '2023-11-21';
        $loan2->checkin = '2023-11-23';
        $loan2->obser = 'El libro estaba intacto';
        $loan2->state = 'ended';
        $loan2->book_id = 2;

        $loan2->save();

    }
}