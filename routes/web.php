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
Route::resource('/prestamos', 'PrestamoController');
Route::resource('/contables', 'ContableController');
Route::resource('/sedes', 'SedeController');
Route::resource('/areas', 'AreaController');
Route::resource('/cargos', 'CargoController');

//rutas selects vista
Route::get('/cargarUrbes', 'UrbeController@obtenerUrbes');
Route::get('/cargarComunas', 'ComunaController@obtenerComunas');
Route::get('/cargarSedes', 'SedeController@obtenerSedes');
Route::get('/cargarAreas', 'AreaController@obtenerAreas');
Route::get('/cargarCargos', 'CargoController@obtenerCargos');

Route::get('/obtenerUltimaSede', 'SedeController@obtenerUltimaSede');
Route::get('/obtenerUltimaArea', 'AreaController@obtenerUltimaArea');
Route::get('/obtenerUltimoCargo', 'CargoController@obtenerUltimoCargo');

//rutas actualizar por medio de ajax
Route::post('/socios/editar_nombres', 'SocioController@editarNombres');
Route::post('/socios/editar_apellidos', 'SocioController@editarApellidos');
Route::post('/socios/editar_rut', 'SocioController@editarRut');
Route::post('/socios/editar_genero', 'SocioController@editarGenero');
Route::post('/socios/editar_fecha_nacimiento', 'SocioController@editarFechaNacimiento');
Route::post('/socios/editar_celular', 'SocioController@editarCelular');
Route::post('/socios/editar_fijo', 'SocioController@editarFijo');
Route::post('/socios/editar_correo', 'SocioController@editarCorreo');
Route::post('/socios/editar_direccion', 'SocioController@editarDireccion');
Route::post('/socios/editar_fecha_ingreso_pucv', 'SocioController@editarFechaIngresoPucv');
Route::post('/socios/editar_anexo', 'SocioController@editarAnexo');
Route::post('/socios/editar_fecha_ingreso_sind1', 'SocioController@editarFechaIngresoSind1');
Route::post('/socios/editar_numero_socio', 'SocioController@editarNumeroSocio');
Route::post('/socios/editar_ciudad', 'SocioController@editarCiudad');
Route::post('/socios/editar_comuna', 'SocioController@editarComuna');
Route::post('/socios/editar_sede', 'SocioController@editarSede');
Route::post('/socios/editar_area', 'SocioController@editarArea');
Route::post('/socios/editar_cargo', 'SocioController@editarCargo');

//pdf
Route::get('/comprobante_prestamo', 'PdfController@pdf');