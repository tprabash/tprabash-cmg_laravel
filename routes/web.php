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

Route::get('create', function () {
    return view('create');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/delete/{id}', 'HomeController@delete')->name('delete');
Route::get('/update/{id}', 'HomeController@update')->name('update');
Route::post('/updateuser', 'HomeController@updateuser')->name('updateuser');
Route::post('/register', 'HomeController@register')->name('register');