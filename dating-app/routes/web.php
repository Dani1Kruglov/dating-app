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
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/{user}/dislike', 'IndexController@updateDislikes')->name('dislikes.update');
    Route::get('/home/{user}/like', 'IndexController@updateLikes')->name('likes.update');
    Route::get('/my_profile', 'MyPageController')->name('my.page');
    Route::get('/my_profile/{user}/edit', 'EditController')->name('my.page.edit');
    Route::patch('/my_profile/{user}', 'UpdateController')->name('my.page.update');
    Route::delete('/my_profile/{user}', 'DestroyController')->name('my.page.destroy');
});

Route::group(['namespace'=>'Auth'], function () {

    Route::match(['get', 'post'], '/check_account', 'CheckController')->name('check.account');
    Route::post('/restore_account', 'RestoreController@restoreAccount')->name('restore.account');
    Route::post('/force_delete_account', 'RestoreController@forceDeleteAccount')->name('force.delete.account');

});

Route::get('/', 'HomeController@index')->name('log.register');
