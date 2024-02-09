<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\HorasController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\AtencionesController;
use App\Http\Controllers\VeterinariosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
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

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


//Route::post('/contacto/mensaje', 'FrontController@store')->name('contacto');
Route::post('/contacto/mensaje', [FrontController::class, 'store'])->name('contacto');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::resource('/usuario', UsuariosController::class);
Route::post('/usuario/actualizar', [UsuariosController::class,'actualizar'])->name('actualizar');
Route::get('/mascota/table', [MascotasController::class,'getTableMascotas']);
Route::resource('/mascota', MascotasController::class);
Route::get('/mascota/edit/{id}', [MascotasController::class,'edit']);
Route::get('/historial-mascota/{id}', [MascotasController::class,'historial'])->name('historial');
Route::post('/mascota-edit/{id}', [MascotasController::class, 'editarMascota']);
Route::get('/mascota/eliminar/{id}', [MascotasController::class, 'destroy']);

Route::get('/calendario',[HorasController::class,'verCalendario'])->name('calendario');
Route::get('/listar/{user_id}',[HorasController::class,'listar'])->name('listar');


Route::get('/fichas',[MascotasController::class,'ficha']);
Route::post('/buscar-fichas',[MascotasController::class,'buscarFicha'])->name('fichas');
Route::resource('/horas', HorasController::class);
Route::get('/agendar-hora', [HorasController::class,'mishoras']);
Route::get('/mis-horas/table', [HorasController::class,'getTableMisHoras']);
Route::post('/reservar-hora', [HorasController::class,'store'])->name('reservar');
Route::get('/cancelar-horas/{id}',[HorasController::class,'destroy']);
Route::get('/verhoras', [HorariosController::class,'verhoras']);
Route::get('/horario/horas',[HorariosController::class,'hours']);
Route::resource('/atencion', AtencionesController::class);
Route::get('/atencion/{id}', [AtencionesController::class,'show']);
Route::get('/centros/veterinario/{CentroId}',[CentrosController::class,'veterinarios']);

Route::post('/subir-adjuntos/upload', [HorasController::class,'getUpload'])->name('archivo.upload');
Route::get('/detalle-horas-canceladas/{id}', [HorasController::class,'getDetalleHoraCancelada']);
Route::get('/horario/{id}', [HorariosController::class,'index'])->name('horario');
Route::resource('/horario', HorariosController::class);


Route::group(['middleware' => 'doctor'], function() {
    
    //Route::resource('/horario', 'HorariosController');
    Route::resource('/atencion', AtencionesController::class);
    Route::get('/atencion/{id}', [AtencionesController::class,'show']);
   
});

Route::group(['middleware' => 'admin'], function() {
    Route::resource('/atencion', AtencionesController::class);
    Route::get('/atencion/{id}', [AtencionesController::class,'show']);
    Route::get('/veterinario/table', [VeterinariosController::class,'index']);
    Route::resource('/veterinario', VeterinariosController::class);
   
    Route::get('/veterinario-editar/{id}', [VeterinariosController::class,'edit'])->name('veterinario.editar');
    Route::post('/veterinario-edit/{id}', [VeterinariosController::class,'editarVeterinario'])->name('veterinario.edit');
    Route::get('/detalle-canceladas/{id}', [AdminController::class,'getDetalleHoraCancelada'])->name('canceladas');
    Route::get('/detalle-reservadas/{id}', [AdminController::class,'getDetalleHoraReservadas'])->name('detalles.reservadas');

    Route::post('/cancelar-hora', [AdminController::class,'cancelarHora'])->name('cancelar.hora');
    Route::get('/horas-atendidas/{id}', [HorasController::class,'getHorasAtendidas'])->name('atendidas');
});
Route::resource('/atencion', AtencionesController::class);
Route::get('/atencion/{id}', [AtencionesController::class,'show']);
Route::get('/horas-atendidas/{id}', [HorasController::class,'getHorasAtendidas'])->name('atendidas');
Route::get('/pago', function () {
    return view('micuenta.pago');
});
});