<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

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

Route::get('/getclientes', [ClientesController::class, 'allClientes'])->name('get-clientes');
Route::post('/createcliente', [ClientesController::class , 'createCliente'])->name('create-cliente');
Route::put('/updatecliente/{id}', [ClienteController::class, 'updateCliente'])->name('update-cliente');
