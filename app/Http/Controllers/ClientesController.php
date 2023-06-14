<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function consultaCliente(){
        return Clientes::all();
    }

    //api de clientes
    public function allClientes(){
        ClientesController::resetId();
        $clientes = ClientesController::consultaCliente();
        return response()->json($clientes);
    }

    public function getClienteById($id){
        ClientesController::resetId();
        return Clientes::findOrFail($id);
    }

    public function createCliente(Request $request){
        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $endereco = $request->input('endereco');
        $desde = $request->input('desde');

        $cliente = [
            'nome' => $nome,
            'telefone' => $telefone,
            'endereco' => $endereco,
            'desde' => $desde
        ];

        Clientes::insert($cliente);
        return response()->json(['message' => 'cliente cadastrado']);
    }

    public function updateCliente(Request $request, $id){
        $cliente = ClientesController::getClienteById($id);

        $clienteUp = [];

        $nome = $request->input('nome');
        if ($nome !== null) {
            $clienteUp['nome'] = $nome;
        }

        $telefone = $request->input('telefone');
        if ($telefone !== null) {
            $clienteUp['telefone'] = $telefone;
        }

        $endereco = $request->input('endereco');
        if ($endereco !== null) {
            $clienteUp['endereco'] = $endereco;
        }

        $desde = $request->input('desde');
        if($desde !== null){
            $clienteUp['desde'] = $desde;
        }

        $cliente->update($clienteUp);
        $cliente->save();
        return response()->json(['message' => 'cliente atualizado']);
    }

    public function getClientesBy($coluna, $e){
        return Clientes::where($coluna, $e)->get();
    }

    public function resetId(){
        DB::statement('ALTER TABLE clientes DROP COLUMN id;');
        DB::statement('ALTER TABLE clientes ADD id INT AUTO_INCREMENT PRIMARY KEY FIRST;');
    }
}
