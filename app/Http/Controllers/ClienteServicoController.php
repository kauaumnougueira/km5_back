<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\ClientesController;

use Illuminate\Support\Facades\DB;
use App\Models\ClienteServico;

class ClienteServicoController extends Controller
{
    //
    public function getAllServicosPorCliente($id_cliente){
        $servicos = new ServicosController();
        return $servicos->getServicosBy($id_cliente);
    }

    public function getAllClientesPorServico($id_servico){
        $clientes = new ClientesController();
        return $clientes->getClienteBy($id_servico);
    }
    
    public function createClienteServico(Request $request){
        $id_cliente = $request->input('id_cliente');
        $id_servico = $request->input('id_servico');
        $data = $request->input('data');

        $cliente_servico = [
            'id_cliente' => $id_cliente,
            'id_servico' => $id_servico,
            'data' => $data
        ];

        ClienteServico::insert($cliente_servico);
        return response()->json(['message' => 'serviço adcionado ao cliente']);
    }

    public function resetId(){
        DB::statement('ALTER TABLE cliente_servico DROP COLUMN id;');
        DB::statement('ALTER TABLE cliente_servico ADD id INT AUTO_INCREMENT PRIMARY KEY FIRST;');
    }
}
