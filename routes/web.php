<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UsuariosController;

// routes/web.php
use App\Http\Controllers\MainController;

Route::get('/home', [MainController::class, 'index'])->name('home');


//guarda el registro del evento en la DB
Route::post('/guardar-evento/{evento}', [MainController::class, 'guardarEvento'])->name('guardar-evento');

//Muestra todos los eventos
Route::get('/mostrar-eventos', [MainController::class, 'index'])->name('mostrar.eventos');

//Muestra todos los eventos que estás registrado
Route::get('/eventos-inscritos', [MainController::class, 'eventosInscritos'])->name('eventos-inscritos');


Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
// routes/web.php

Route::get('/usuarios/{user}', [UsuariosController::class, 'show'])->name('usuarios.show');


Route::put('/perfil/update/{id}',[PerfilController::class,'update'] )->name('perfil.update');

Route::get('/perfil/edit/{id}',[PerfilController::class,'edit'])->name('perfil.edit');
Route::resource('perfil', PerfilController::class);
Route::resource('evento', EventoController::class);

Route::get('/', function () {//aqui debe estar el login
    return view('auth.login');
});

Route::resource('empleado',EmpleadoController::class);//no usar

Auth::routes();

