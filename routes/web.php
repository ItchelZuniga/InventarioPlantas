<?php

use App\Http\Controllers\PlantasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PlantasController::class, 'index'])->name('plantas.index');

//ruta para crear planta
Route::post('/create-planta', [PlantasController::class, 'create'])->name('plantas.create');
//editar planta
Route::post('/edit-planta', [PlantasController::class, 'update'])->name('plantas.update');

Route::get('/delete-planta-{ID}', [PlantasController::class, 'delete'])->name('plantas.delete');