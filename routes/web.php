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

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'consulta'], function () {
        Route::get('/', 'HomeController@index')->name('consulta');
        Route::put('/despesa/atualizar/{data}', 'DespesaController@update')->name('despesas.update');
        Route::get('/despesa/editar/{data}', 'DespesaController@edit')->name('despesas.edit');
        Route::get('/despesa/criar/{data}', 'DespesaController@create')->name('despesas.create');
        Route::post('/despesa/criar', 'DespesaController@store')->name('despesas.store');
        Route::delete('/despesa/{despesa}', 'DespesaController@destroy')->name('despesas.delete');
        Route::get('/despesa/{ano}/{mes}', 'DespesaController@index')->name('consulta.despesa');
    });
});
