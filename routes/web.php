<?php

use Illuminate\Support\Facades\Route;

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



Route::group(['namespace'=>'User','prefix'=>'user'],function (){

    Route::resource('User',UserController::class);
    Route::post('signIn','UserController@signIn') ->name('User.signIn');
    Route::get('signOut','UserController@signOut') ->name('User.signOut');
});

Route::group(['namespace'=>'Tweets','prefix'=>'Tweets'],function (){

    Route::resource('Tweets',TweetsController::class);
    Route::post('showHash','TweetsController@showHash')->name('Tweets.showHashTag');

});

