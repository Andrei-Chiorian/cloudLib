<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LibValorationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeController::class)->name('home');

Route::post('/actualizar-biblioteca',[LibraryController::class, 'update'])->name('library.update');

Route::post('/actualizar-libro',[BookController::class, 'update'])->name('book.update');

Route::post('/actualizar-prestamo',[LoanController::class, 'update'])->name('loan.update');

Route::post('/checkin-prestamo',[LoanController::class, 'checkin'])->name('loan.update.show');

Route::get('/crear-biblioteca',[LibraryController::class, 'create'])->name('library.create');

// Route::get('/{book:name}/crear-prestamo',[LoanController::class, 'create'])->name('loan.create');

Route::get('/editar-perfil',[ProfileController::class, 'index'])->name('profile.index');
Route::post('/editar-perfil',[ProfileController::class, 'store'])->name('profile.store');

Route::delete('/eliminar-biblioteca',[LibraryController::class, 'destroy'])->name('library.destroy');

Route::delete('/eliminar-libro',[BookController::class, 'destroy'])->name('book.destroy');

Route::delete('/eliminar-like',[LibValorationController::class, 'destroy'])->name('likes.destroy');

Route::delete('/eliminar-nota',[NoteController::class, 'destroy'])->name('note.destroy');

Route::delete('/eliminar-prestamo',[LoanController::class, 'destroy'])->name('loan.destroy');

Route::post('/guardar-biblioteca',[LibraryController::class, 'store'])->name('library.store');

Route::post('/guardar-libro',[BookController::class, 'store'])->name('book.store');

Route::post('/guardar-like',[LibValorationController::class, 'store'])->name('likes.store');

Route::post('/guardar-nota',[NoteController::class, 'store'])->name('note.store');

Route::post('/guardar-prestamo',[LoanController::class, 'store'])->name('loan.store');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/prestamos',[LoanController::class, 'index'])->name('loan.index');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/{library:name}',[LibraryController::class, 'index'])->name('library.index');

Route::get('/{library:name}/actualizar-biblioteca',[LibraryController::class, 'updateShow'])->name('library.updateShow');

Route::get('/{library:name}/crear-libro',[BookController::class, 'create'])->name('book.create');

Route::get('/{library:name}/{book:name}',[BookController::class, 'index'])->name('book.index');

Route::get('/{library:name}/{book:name}/actualizar-libro',[BookController::class, 'updateShow'])->name('book.updateShow');

Route::get('/{library:name}/{book:name}/crear-prestamo',[LoanController::class, 'create'])->name('loan.create');