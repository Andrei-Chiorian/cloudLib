<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $book = new Book();
        
        $book->name = 'El niño lleno de pelo';
        $book->author = 'Miguel de Cervantes';
        $book->editorial = 'deBolsillo';
        $book->synopsis = 'Erase un niño lleno de pelo y con una maleta dirigiendose al monto olimpo';
        $book->page_num = '455';
        $book->book_cond = 'Bueno';
        $book->obser = '';
        $book->valoration = 3;
        $book->library_id = 1;

        $book->save();

        $book2 = new Book();
        
        $book2->name = 'Julio el portero';
        $book2->author = 'Lev Tolstoy';
        $book2->editorial = 'deBolsillo';
        $book2->synopsis = 'Van dos y se cae el del medio';
        $book2->page_num = '199';
        $book2->book_cond = 'Usado';
        $book2->obser = 'Esquinas un poco estropeadas';
        $book2->valoration = 5;
        $book2->library_id = 1;

        $book2->save();

        $book3 = new Book();
        
        $book3->name = 'Crimen y castigo';
        $book3->author = 'Lev Tolstoy';
        $book3->editorial = 'Montes';
        $book3->synopsis = 'lleno de pelo y con una maleta dirigiendose al monto olimpo caundo el ave estaba cerca, lo vio y se lo comio en el tren de camino a belen';
        $book3->page_num = '455';
        $book3->book_cond = 'Deteriorado';
        $book3->obser = 'Faltan las tapas';
        $book3->valoration = 3;
        $book3->library_id = 2;

        $book3->save();

        $book4 = new Book();
        
        $book4->name = 'Moksha';
        $book4->author = 'Aldous Huxley';
        $book4->editorial = 'Alfaguara';
        $book4->synopsis = 'palbaras sueltas al tun tun palbaras sueltas al tun tun palbaras sueltas al tun tun palbaras sueltas al tun tun palbaras sueltas al tun tun palbaras sueltas al tun tun palbaras sueltas al tun tun palbaras sueltas al tun tun palbaras sueltas al tun tun';
        $book4->page_num = '600';
        $book4->book_cond = 'Usado';
        $book4->obser = 'Marcas en la tapa';
        $book4->valoration = 5;
        $book4->library_id = 2;

        $book4->save();
    }
}