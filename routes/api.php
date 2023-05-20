<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ClienteServicoController;
use App\Models\ClienteServico;

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
Route::get('/getcliente/{id}', [ClientesController::class, 'getClientebyId'])->name('get-cliente');
Route::post('/createcliente', [ClientesController::class , 'createCliente'])->name('create-cliente');
Route::post('/updatecliente/{id}', [ClientesController::class, 'updateCliente'])->name('update-cliente');

Route::post('/createclienteservico', [ClienteServicoController::class, 'createClienteServico'])->name('create-clienteservico');
Route::get('/getservicoporcliente/{id}', [ClienteServicoController::class, 'getAllServicosPorCliente']);
Route::get('/getclienteporservico/{id}', [ClienteServicoController::class, 'getAllClientesPorServico']);

Route::get('/getservicos', [ClientesController::class, 'allServicos'])->name('get-servicos');
Route::get('/getservico/{id}', [ClientesController::class, 'getServicobyId'])->name('get-servico');
