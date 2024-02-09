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
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/home', function () {
    return view('micuenta.inicio');
});

Auth::routes();



Route::post('/contacto/mensaje', 'FrontController@store')->name('contacto');

Route::group(['middleware' => 'auth'], function() {
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/usuario', 'UsuariosController');
Route::post('/usuario/actualizar', 'UsuariosController@actualizar')->name('actualizar');

Route::get('/mascota/table', 'MascotasController@index');
Route::resource('/mascota', 'MascotasController');
Route::get('/mascota/edit/{id}', 'MascotasController@edit');
Route::post('/mascota-edit/{id}', 'MascotasController@editarMascota');
Route::get('/mascota/{id}', 'MascotasController@show')->name('mascota');
Route::get('/historial-mascota/{id}', 'MascotasController@historial')->name('historial');
Route::get('/fichas','MascotasController@ficha');
Route::post('/buscar-fichas','MascotasController@buscarFicha')->name('fichas');

Route::resource('/horas', 'HorasController');
Route::get('/agendar-hora', 'HorasController@mishoras');
Route::get('/mis-horas/table', 'HorasController@getTableMisHoras');
Route::post('/reservar-hora', 'HorasController@store')->name('reservar');
Route::get('/verhoras', 'HorariosController@verhoras');
Route::get('/horario/horas','HorariosController@hours');




Route::get('/centros/veterinario/{CentroId}','CentrosController@veterinarios');

Route::get('/horas-atendidas/{id}', 'HorasController@getHorasAtendidas')->name('atendidas');

Route::post('/subir-adjuntos/upload', 'HorasController@getUpload')->name('archivo.upload');

Route::get('/detalle-horas-canceladas/{id}', 'HorasController@getDetalleHoraCancelada');
Route::get('/cancelar-horas/{id}','HorasController@destroy');
Route::get('/horario/{id}', 'HorariosController@index')->name('horario');

Route::resource('/horario', 'HorariosController');


Route::group(['middleware' => 'doctor'], function() {
    
    //Route::resource('/horario', 'HorariosController');
    Route::resource('/atencion', 'AtencionesController');
    Route::get('/atencion/{id}', 'AtencionesController@show');
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/veterinario/table', 'VeterinariosController@index');
    Route::resource('/veterinario', 'VeterinariosController');
    Route::post('/veterinario-editar', 'VeterinariosController@editarVeterinario')->name('veterinario.editar');
    Route::get('/detalle-canceladas/{id}', 'AdminController@getDetalleHoraCancelada')->name('canceladas');
    Route::get('/detalle-reservadas/{id}', 'AdminController@getDetalleHoraReservadas')->name('detalles.reservadas');
    //Route::get('/detalle-atendidas/{id}', 'AdminController@getDetalleHoraAtendidas')->name('detalles.reservadas');
    Route::post('/cancelar-hora', 'AdminController@cancelarHora')->name('cancelar.hora');
});


Route::get('/limpiar-cache', 'CacheController@limpiarCache');




});


