<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relatorios;
class RelatorioController extends Controller
{
    //
    public function getAllRelatorios()
    {
        return Relatorios::all();
    }
    //sse quiser relatorios por cliente, tem que pesquisar no cliente serviço qual cliente tem tal relatorio, nao é funcao do relatorio ter essa informação
    public function getRelatorioById($id_relatorio)
    {
        return Relatorios::findOrFail($id_relatorio);
    }

    public function createRelatorio($data_relatorio)
    {
        $relatorio = [
            'descricao' => $data_relatorio['descricao'],
            'data' => $data_relatorio['data'],
        ];

        Relatorios::insert($relatorio);
        return response()->json(['message' => 'realatório criado']);
    }
    //sem remove pra nenhum crud por enquanto
    public function removeRelatorio($id_relatorio)
    {

    }
}
