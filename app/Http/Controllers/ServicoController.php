<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function executar(Request $request){
        $parametros = $request->all();
        $comando = "\$dados = \App\\".ucfirst($request->model)."::$request->funcao"."(\$parametros);";
        eval($comando);
        return json_encode($dados);
        //return json_encode($comando);
    }
}
