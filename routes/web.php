<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentController;
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

Route::get('/', function () {
    return view('user/login');
});

Route::post('/logout', [UserController::class, 'logoff']);
Route::post('/logout', [BookController::class, 'logoff']);
Route::post('/auth', [UserController::class, 'auth'])->name('auth.user');


 Route::middleware(['backhistory'])->group(function (){
     Route::resource('books', BookController::class);
 });


//Route::resource('users', UserController::class)->middleware('admin');
Route::resource('users', UserController::class);
Route::resource('books', BookController::class)->middleware(['admin', 'backhistory']);
Route::resource('rent', RentController::class);
Route::get('deactive/{id}', [RentController::class, 'deactive'])->middleware('admin');
Route::get('search/books', [BookController::class, 'searchBook']);
Route::get('search/rent', [RentController::class, 'searchRent']);