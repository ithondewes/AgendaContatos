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

Route::get('/', 'HomeController@index')->name('home');

Route::any('contatos/search', 'ContatoController@search')->name('contatos.search');
Route::group(['middleware'=>'auth', 'prefix'=>'contatos'], function() {
    Route::get('/', 'ContatoController@index');
    Route::get('/add', 'ContatoController@create');
    Route::post('/', 'ContatoController@store');
    Route::get('{id}', 'ContatoController@show');
    Route::get('/edit/{id}', 'ContatoController@edit');
    Route::put('{id}', 'ContatoController@update');
    Route::delete('{id}', 'ContatoController@destroy');
});

Route::group(['middleware'=>'auth', 'prefix'=>'telefones'], function() {
    Route::get('/add', 'TelefoneController@create');
    Route::post('/', 'TelefoneController@store');
    Route::get('/{id}', 'TelefoneController@show');
    Route::get('/edit/{id}', 'TelefoneController@edit');
    Route::put('{id}', 'TelefoneController@update');
    Route::delete('{id}', 'TelefoneController@destroy');
});

Route::group(['middleware'=>'auth', 'prefix'=>'enderecos'], function() {
    Route::get('/add', 'EnderecoController@create');
    Route::post('/', 'EnderecoController@store');
    Route::get('{id}', 'EnderecoController@show');
    Route::get('/edit/{id}', 'EnderecoController@edit');
    Route::put('{id}', 'EnderecoController@update');
    Route::delete('{id}', 'EnderecoController@destroy');
});