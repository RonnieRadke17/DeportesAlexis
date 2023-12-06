<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UsuariosController;

// routes/web.php
use App\Http\Controllers\MainController;
Route::get('/mostrar-eventos', [MainController::class, 'index'])->name('mostrar.eventos');




Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
// routes/web.php

Route::get('/usuarios/{user}', [UsuariosController::class, 'show'])->name('usuarios.show');


Route::put('/perfil/update/{id}',[PerfilController::class,'update'] )->name('perfil.update');

Route::get('/perfil/edit/{id}',[PerfilController::class,'edit'])->name('perfil.edit');
Route::resource('perfil', PerfilController::class);
Route::resource('evento', EventoController::class);
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

Route::resource('empleado',EmpleadoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');