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

Auth::routes();
Route::resource('/session', 'SessionController');
Route::resource('/ticket', 'TicketController');
Route::resource('/films', 'FilmController');
Route::resource('/user', 'UserController');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/precos', 'PaginasController@preco')->name('precos');
Route::get('/EmBreve', 'FilmController@emBreve')->name('films.emBreve');
Route::get('/snackBar', 'PaginasController@snackBar')->name('snackBar');
Route::get('/EmCartaz', 'FilmController@emCartaz')->name('films.emCartaz');
