<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;

class ServicosController extends Controller
{
    //public function consulta(){
    public function consultaServicos(){
        return Servicos::all();
    }

    //api de serviços
    public function allServicos(){
        //ServicosController::resetId();
        $servicos = ServicosController::consultaServicos();
        return response()->json($servicos);
    }

    public function getServicoById($id){
        //ServicosController::resetId();
        return Servicos::findOrFail($id);
    }

    public function getServicosBy($coluna, $e){
        return Servicos::where($coluna, $e)->get();
    }
}
