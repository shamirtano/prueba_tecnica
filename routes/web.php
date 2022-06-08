<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

// Route Greoup Empleado
Route::group(['prefix' => '/'], function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('empleado.index');
    Route::get('/show/{id}', [EmpleadoController::class, 'show'])->name('empleado.show');
    Route::get('/create', [EmpleadoController::class, 'create'])->name('empleado.create');
    Route::post('/store', [EmpleadoController::class, 'store'])->name('empleado.store');
    Route::get('/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleado.edit');
    Route::post('/{id}/update', [EmpleadoController::class, 'update'])->name('empleado.update');
    Route::get('/{id}/delete', [EmpleadoController::class, 'delete'])->name('empleado.delete');
});
