<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();


Route::group(['middleware'=>'allRoles'], function (){
    Route::get('/home', 'IndexController@index')->name('index');
    Route::get('/home/{user}/dislike', 'IndexController@updateDislikes')->name('dislikes.update');
    Route::get('/home/{user}/like', 'IndexController@updateLikes')->name('likes.update');
});

Route::get('/', 'HomeController@index')->name('log.register');


Route::get('/h', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
