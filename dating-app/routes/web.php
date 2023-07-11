<?php

use App\Http\Controllers\MessageController;
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



Auth::routes(['verify'=>true]);



Route::group(['middleware'=>'allRoles', 'verified'], function (){
    Route::match(['get', 'post'],'/', 'HomeController@index')->name('home');
    Route::post('/home/{user}/dislike', 'UpdateDislikesOrLikesController@updateDislikes')->name('dislikes.update');
    Route::post('/home/{user}/like', 'UpdateDislikesOrLikesController@updateLikes')->name('likes.update');
    Route::get('/my_profile', 'MyPageController')->name('my.page');
    Route::get('/my_profile/{user}/edit', 'EditController')->name('my.page.edit');
    Route::patch('/my_profile/{user}', 'UpdateAuthUserController')->name('my.page.update');
    Route::delete('/my_profile/{user}', 'DestroyController')->name('my.page.destroy');
    Route::get('/messages', 'MessageController@index')->name("messages");
    Route::post('/messages', 'MessageController@store');

});

Route::group(['namespace'=>'Auth'], function () {
    Route::match(['get', 'post'], '/check_account', 'CheckController')->name('check.account');
    Route::post('/restore_account', 'RestoreController@restoreAccount')->name('restore.account');
    Route::post('/force_delete_account', 'RestoreController@forceDeleteAccount')->name('force.delete.account');
});
