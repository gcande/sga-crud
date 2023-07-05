<?php

use App\Http\Controllers\EventoController;
use App\Models\TblPrograma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;

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
Route::get('programas', function () {
    return view('programas');
})->name('programasRuta');



//controladar de recursos
Route::resource('programas', ProgramaController::class);
// Route::resource('eventoscalendar', EventoController::class);

// Route::get('editarprograma', function() {
//     return view('editarprograma');
// })->name('editarprog');

// Route::get('/programas/crearprograma', function() {
//     return view('crearprograma');
// })->name('crearprograma');



//rutas fullcalendar
Route::get('/evento', [App\Http\Controllers\EventoController::class, 'index']);
Route::get('/evento/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
Route::post('/evento/agregar', [App\Http\Controllers\EventoController::class, 'store']);
Route::post('/evento/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
Route::post('/evento/borrar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
