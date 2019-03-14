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

//rutas selects vista create
Route::get('/socios/areas/{id}', 'AreaController@obtenerAreas');
Route::get('/socios/comunas/{id}', 'ComunaController@obtenerComunas');