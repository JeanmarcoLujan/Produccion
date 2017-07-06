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

Route::get('/home', 'HomeController@index');


Route::resource('camion', 'CamionController');

Route::resource('cargador', 'CargadorController');
Route::get('/select-cargador', 'CargadorController@selects');

Route::resource('compactadora', 'CompactadoraController');

Route::resource('exc-retroexc', 'ExcavadoraController');
Route::get('/select-exc', 'ExcavadoraController@selects');

Route::resource('motoniveladora', 'MotoniveladoraController');

Route::resource('tractor', 'TractorController');
Route::get('/select-tractor', 'TractorController@selects');


Route::resource('/produccion/{id}/{type}', 'ProduccionController@mostrar');



