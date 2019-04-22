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
Route::resource('/socios', 'SocioController')->middleware('auth');
Route::resource('/prestamos', 'PrestamoController')->middleware('auth');
Route::resource('/contables', 'ContableController')->middleware('auth');
Route::resource('/sedes', 'SedeController')->middleware('auth');
Route::resource('/areas', 'AreaController')->middleware('auth');
Route::resource('/cargos', 'CargoController')->middleware('auth');
Route::resource('/usuarios', 'UserController')->middleware('auth');

//rutas selects vista
Route::get('/cargarUrbes', 'UrbeController@obtenerUrbes')->middleware('auth');
Route::get('/cargarComunas', 'ComunaController@obtenerComunas')->middleware('auth');
Route::get('/cargarSedes', 'SedeController@obtenerSedes')->middleware('auth');
Route::get('/cargarAreas', 'AreaController@obtenerAreas')->middleware('auth');
Route::get('/cargarCargos', 'CargoController@obtenerCargos')->middleware('auth');

Route::get('/obtenerUltimaSede', 'SedeController@obtenerUltimaSede')->middleware('auth');
Route::get('/obtenerUltimaArea', 'AreaController@obtenerUltimaArea')->middleware('auth');
Route::get('/obtenerUltimoCargo', 'CargoController@obtenerUltimoCargo')->middleware('auth');

//rutas actualizar por medio de ajax
Route::post('/socios/editar_nombres', 'SocioController@editarNombres')->middleware('auth');
Route::post('/socios/editar_apellidos', 'SocioController@editarApellidos')->middleware('auth');
Route::post('/socios/editar_rut', 'SocioController@editarRut')->middleware('auth');
Route::post('/socios/editar_genero', 'SocioController@editarGenero')->middleware('auth');
Route::post('/socios/editar_fecha_nacimiento', 'SocioController@editarFechaNacimiento')->middleware('auth');
Route::post('/socios/editar_celular', 'SocioController@editarCelular')->middleware('auth');
Route::post('/socios/editar_fijo', 'SocioController@editarFijo')->middleware('auth');
Route::post('/socios/editar_correo', 'SocioController@editarCorreo')->middleware('auth');
Route::post('/socios/editar_direccion', 'SocioController@editarDireccion')->middleware('auth');
Route::post('/socios/editar_fecha_ingreso_pucv', 'SocioController@editarFechaIngresoPucv')->middleware('auth');
Route::post('/socios/editar_anexo', 'SocioController@editarAnexo')->middleware('auth');
Route::post('/socios/editar_fecha_ingreso_sind1', 'SocioController@editarFechaIngresoSind1')->middleware('auth');
Route::post('/socios/editar_numero_socio', 'SocioController@editarNumeroSocio')->middleware('auth');
Route::post('/socios/editar_ciudad', 'SocioController@editarCiudad')->middleware('auth');
Route::post('/socios/editar_comuna', 'SocioController@editarComuna')->middleware('auth');
Route::post('/socios/editar_sede', 'SocioController@editarSede')->middleware('auth');
Route::post('/socios/editar_area', 'SocioController@editarArea')->middleware('auth');
Route::post('/socios/editar_cargo', 'SocioController@editarCargo')->middleware('auth');

//rutas independientes socios
Route::get('/buscarUltimoNumeroSocio', 'SocioController@buscarUltimoNumeroSocio')->middleware('auth');

//rutas independientes prestamos
Route::get('/validarPrestamo', 'PrestamoController@validarPrestamo')->middleware('auth');
Route::get('/buscarIdEnPrestamos', 'PrestamoController@buscarIdEnPrestamos')->middleware('auth');
Route::get('/buscarUltimoNumeroPrestamo', 'PrestamoController@buscarUltimoNumeroPrestamo')->middleware('auth');

//pago automatico de cuotas
Route::get('/pagoAutomaticoCuotas', 'CuotaController@pagoAutomaticoCuotas')->middleware('auth');
Route::get('/comprobarEstadoPrestamo', 'PrestamoController@comprobarEstadoPrestamo')->middleware('auth');

//rutas estadisticas
Route::get('/estadisticasSocios', 'SocioController@estadisticasSocios')->name('todos')->middleware('auth');
Route::get('/estadisticaCantidadPrestamos', 'SocioController@estadisticaCantidadPrestamos')->name('cantidad')->middleware('auth');
Route::get('/estadisticaIncorporacionSocios', 'SocioController@estadisticaIncorporacionSocios')->name('incorporaciones')->middleware('auth');

Route::post('/verEstadisticaCantidadPrestamos', 'SocioController@verEstadisticaCantidadPrestamos')->name('ver_cantidad')->middleware('auth');
Route::post('/verEstadisticaIncorporacionSocios', 'SocioController@verEstadisticaIncorporacionSocios')->name('ver_incorporaciones')->middleware('auth');

//pdf
//Route::get('/comprobante_prestamo', 'PdfController@pdf');