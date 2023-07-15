<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\ClientesController;

use Illuminate\Support\Facades\DB;
use App\Models\ClienteServico;

class ClienteServicoController extends Controller
{
    //aqui que vou criar o historico
    public function getAllServicosPorCliente($id_cliente){
        $servicos = new ServicosController();
        return $servicos->getServicosBy('id', $id_cliente);
    }

    public function getAllClientesPorServico($id_servico){
        $clientes = new ClientesController();
        return $clientes->getClienteBy('id', $id_servico);
    }

    public function createClienteServico($data_clienteservico){

        $cliente_servico = [
            'id_cliente' => $data_clienteservico['id_cliente'],
            'id_relatorio' => $data_clienteservico['id_servico'],
            'id_nome' => $data_clienteservico['nome'],
            'preco' => $data_clienteservico['preco']
        ];

        ClienteServico::insert($cliente_servico);
        return response()->json(['message' => 'serviço adcionado ao cliente']);
    }

    public function getAllClienteServico($id){
        return ClienteServico::where('id_cliente', $id)->get();
    }

    public function resetId(){
        DB::statement('ALTER TABLE cliente_servico DROP COLUMN id;');
        DB::statement('ALTER TABLE cliente_servico ADD id INT AUTO_INCREMENT PRIMARY KEY FIRST;');
    }
}
