<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DescripcionMaterialController;
use App\Http\Controllers\ActaEntregaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*|--------------------------------------------------------------------------
| API Routes clientes*/
Route::get('/cliente', [ClientesController::class, 'index']);
Route::get('/cliente/{id}', [ClientesController::class, 'show']);
Route::post('/cliente', [ClientesController::class, 'store']);
Route::put('/cliente/{id}', [ClientesController::class, 'update']);
Route::delete('/cliente/{id}', [ClientesController::class, 'destroy']);

/*|--------------------------------------------------------------------------
| API Routes descripcion material*/
Route::get('/descripcion', [DescripcionMaterialController::class, 'index']);
Route::get('/descripcion/{id}', [DescripcionMaterialController::class, 'show']);
Route::post('/descripcion', [DescripcionMaterialController::class, 'store']);
Route::put('/descripcion/{id}', [DescripcionMaterialController::class, 'update']);
Route::delete('/descripcion/{id}', [DescripcionMaterialController::class, 'destroy']);

/*|--------------------------------------------------------------------------
| API Routes acta entrega*/
Route::get('/acta', [ActaEntregaController::class, 'index']);
Route::get('/acta/{id}', [ActaEntregaController::class, 'show']);
Route::post('/acta', [ActaEntregaController::class, 'store']);
Route::put('/acta/{id}', [ActaEntregaController::class, 'update']);
Route::delete('/acta/{id}', [ActaEntregaController::class, 'destroy']);