<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    public function consulta(){
        return Clientes::all();
    }

    //api de clientes
    public function allClientes(){
        $clientes = ClientesController::consulta();
        return response()->json($clientes);
    }

    public function getClienteById($id){
        return Clientes::findOrFail($id);
    }

    public function createCliente(Request $request){
        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $endereco = $request->input('endereco');

        $cliente = [
            'nome' => $nome,
            'telefone' => $telefone,
            'endereco' => $endereco
        ];

        Clientes::insert($cliente);
        return response()->json(['message' => 'cliente cadastrado']);
    }

    public function updateCliente(Request $request, $id){
        $cliente = ClientesController::getClienteById($id);

        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $endereco = $request->input('endereco');

        $clienteUp = [
            'nome' => $nome,
            'telefone' => $telefone,
            'endereco' => $endereco
        ];

        $cliente->update($clienteUp);
        return response()->json(['message' => 'cliente cadastrado']);
    }
}
