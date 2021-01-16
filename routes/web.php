<?php

use App\Http\Controllers\UsuariosController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("/gestion/usuarios", [UsuariosController::class, "index"])->middleware(["auth"])->name("usuarios");
Route::get("/gestion/usuarios/editar/{id}", [UsuariosController::class, "editar"])->middleware(["auth"])->name("editarusuario");
Route::post("/gestion/usuarios/guardar", [UsuariosController::class, "guardar"])->middleware(["auth"]);
Route::post("/gestion/usuarios/eliminar", [UsuariosController::class, "eliminar"])->middleware(["auth"]);

require __DIR__.'/auth.php';
