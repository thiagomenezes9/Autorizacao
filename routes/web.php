<?php

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
    return view('welcome');
});

Auth::routes();





Route::group(['middleware'=>['web']],function (){
    Route::group(['prefix'=>'auth'],function (){
        Route::get('/{id}',function ($user_id){
            $user = \App\User::find($user_id);
            Auth::login($user);
            return 'Você está logado como '.Auth::user()->name;
        });
    });
});







Route::group(['prefix'=>'admin' , 'as'=>'admin.'],function (){
    Route::group(['middleware'=>'can:admin'],function (){

    Route::get('home','HomeAdminController@index')->name('home');
        });
});





Route::resource('posts', 'PostController');
