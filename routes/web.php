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

//login
Route::get('/', function () {
    return view('auth.login');
});

//rutas autenticación
Auth::routes();

//redireccion desde home
Route::redirect('/home', '/socios');

//rutas resource
Route::resource('/socios', 'SocioController');
Route::resource('/sedes', 'SedeController');
Route::resource('/areas', 'AreaController');
Route::resource('/cargos', 'CargoController');

//rutas selects vista
Route::get('/cargarUrbes', 'UrbeController@obtenerUrbes');
Route::get('/cargarSedes', 'SedeController@obtenerSedes');
Route::get('/cargarAreas', 'AreaController@obtenerAreas');
Route::get('/cargarComunas', 'ComunaController@obtenerComunas');

Route::get('/obtenerUltimaSede', 'SedeController@obtenerUltimaSede');
Route::get('/obtenerUltimaArea', 'AreaController@obtenerUltimaArea');
Route::get('/obtenerUltimoCargo', 'CargoController@obtenerUltimoCargo');