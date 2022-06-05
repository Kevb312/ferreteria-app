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


#proveedores

Route::get('/proveedor-form', 'proveedorController@getForm')->name('proveedorForm');

Route::get('proveedor-list', 'proveedorController@getList')->name('proveedorList');

Route::get('proveedor-detalle/{id}', 'proveedorController@getDetalle')->name('proveedorDetalle');

Route::post('/save-proveedor', 'proveedorController@post')->name('guardarProveedor');

Route::post('update-proveedor', 'proveedorController@update')->name('updateProveedor');

#sucursales

Route::get('sucursal-form', 'sucursalController@getForm')->name('sucursalForm');

Route::get('sucursal-list', 'sucursalController@getList')->name('sucursalList');

Route::get('sucursal-detalle/{id}', 'sucursalController@getDetalle')->name('sucursalDetalle');

Route::get('sucursal-delete/{id}', 'sucursalController@delete')->name('sucursalBorrar');

Route::post('save-sucursal', 'sucursalController@post')->name('guardarSucursal');

Route::post('sucursal-update', 'sucursalController@update')->name('updateSucursal');

