<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\PhoneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\UserController;

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [RegisterController::class, 'login']);

Route::post('book', [BookController::class, 'book']);

Route::post('book/{id}', [BookController::class, 'update']);

Route::get('book/{id}', [BookController::class, 'detail']);

//Route::get('user', [UserController::class, 'detail']);

Route::delete("book/{id}", [BookController::class, 'delete']);

Route::get("book",[BookController::class,'imagebook']);

Route::group(['middleware'=>['auth:api']],function(){
    Route::get('auth-test',function(){
        return 'başarılı..'.auth()->user()->email;
    });
    Route::get("user",[UserController::class,'detail'])->name('detail');

    Route::post("user",[UserController::class,'update'])->name('update');
});

//PHONE 
Route::post("phone",[PhoneController::class,'create']);
Route::get('phone',[PhoneController::class,'getList']);
Route::post('phonetest',[PhoneController::class,'postLastDatas']);


