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

Route::get('/', function () {
    return view('welcome');
});

#Marcas y refacciones
Route::get('/marcas', 'marcasController@get')->name('marcas');

Route::get('/agregar-refaccion/{id}', 'marcasController@getFormRefaccion')->name('agregarRefaccionForm');

Route::post('guardar-refaccion/{id}', 'marcasController@store')->name('guardarRefaccion');


#refacciones
Route::get('/refacciones-list', 'refaccionesController@getRefacciones')->name('refaccionesList');

Route::post('/refacciones-update', 'refaccionesController@updateRefaccion')->name('updateRefaccion');
