<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\TipoServico;

class TipoServicoController extends Controller
{
    public function getAllTipoServico(){
        return TipoServico::all();
    }

    public function getTipoServicoByIdServico($id){
        return TipoServico::where('id_servico', $id)->get();
    }
}
