<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\BookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware'=>['AuthCheck']], function (){
    Route::get('/form', function () {
        return view('form');
    });
    Route::get('/', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'register']);

    Route::post('/login', [AuthController::class, 'login']);


    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');




});

