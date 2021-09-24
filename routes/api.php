<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\MovieController;
use \App\Http\Controllers\Api\TicketController;
use \App\Http\Controllers\Api\SeatController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Authentication Route
|--------------------------------------------------------------------------
*/

Route::post('/register',[AuthController::class ,'register'])->name('register');
Route::post('/login',[AuthController::class ,'login'])->name('login');

/*
|--------------------------------------------------------------------------
| Movies Routes
|--------------------------------------------------------------------------
*/

Route::get('/movies',[MovieController::class,'index'])->name('index.movies');
Route::get('/movies/{id}',[MovieController::class,'show'])->name('show.movie');

    /*
    |--------------------------------------------------------------------------
    | Protected Route For Authenticated Users
    |--------------------------------------------------------------------------
    */

    Route::group(['middleware' => ['auth:sanctum']] , function (){

    /*
    |--------------------------------------------------------------------------
    | Ticket Resources
    |--------------------------------------------------------------------------
    */

    Route::resource('/ticket',TicketController::class);

    /*
    |--------------------------------------------------------------------------
    | Seat Statistics
    |--------------------------------------------------------------------------
    */

    Route::get('/seat',[SeatController::class,'seatStatistics'])->name('seatStatistics');

    /*
    |--------------------------------------------------------------------------
    | Log Out User
    |--------------------------------------------------------------------------
    */

    Route::post('/logout',[AuthController::class ,'logout'])->name('logout');


});
