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

Route::get('refaccion-cotizar/{id}', 'refaccionesController@getCotizacion')->name('cotizarRefaccion');

Route::post('/refacciones-update', 'refaccionesController@updateRefaccion')->name('updateRefaccion');

Route::post('guardar-cotizacion-refaccion', 'refaccionesController@saveCotizacion')->name('guardarCotizacionRefaccion');


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


#cotizaciones

Route::get('cotizacion-inicial', 'cotizacionController@getForm')->name('nuevaCotizacionForm');

Route::get('cotizacion', 'cotizacionController@getCotizacion')->name('cotizacion');

Route::get('cotizacion-marca', 'cotizacionController@getMarcas')->name('cotizacionMarcaRefaccion');

Route::get('cotizacion-refacciones/{id}', 'cotizacionController@getRefacciones')->name('consultaRefaccionCotizacion');

Route::get('cotizacion-detalle/{id}', 'cotizacionController@cotizacionDetalle')->name('detalleCotizacion');

Route::get('generar-pdf', 'cotizacionController@generarPDF')->name('generarPDF');

Route::get('finalizar', 'cotizacionController@finalizar')->name('finalizarCotizacion');

Route::post('cotizacion-en-Curso', 'cotizacionController@cotizacion')->name('cotizacionEnCurso');

Route::post('cotizacion-guardar', 'cotizacionController@cotizacionGuardar')->name('guardarCotizacion');

#Prueba dompdf
Route::get('generate-pdf', 'PDFController@generatePDF');