<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/plantas', [PlantasController::class, 'test']);
Route::post('/plantas',[PlantasController::class,'store']);
Route::put('/plantas/{id}',[PlantasController::class,'setPlanta']);
Route::delete('/plantas/{id}',[PlantasController::class,'destroy']);

