<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('deneme', function () {
    return view('/deneme');
});

Auth::routes();
//login page
Route::get('login', [LoginController::class, 'loginPage'])->name('loginPage');
//make login
Route::post('login', [LoginController::class, 'login'])->name('login');
//register api
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/booklist', [BookController::class, 'booklist'])->name('booklist');
    Route::get('/', [BookController::class, 'booklist'])->name('home');
    Route::get('/addbook', [BookController::class, 'edit'])->name('addbook');
    Route::post('bookApi', [BookController::class, 'bookApi'])->name('bookApi');
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateUser'])->name('updateUser');
    Route::get('/destroy/{id}', [BookController::class, 'destroy']);
    Route::post('/book/{id}', [BookController::class, 'update'])->name('update');
    Route::get('/show/{id}', [BookController::class, 'show']);
});

//---------------------------------------------------------------------//
Route::get('upload',[SalesController::class,'index']);

Route::post('/upload', [SalesController::class,'store']);
