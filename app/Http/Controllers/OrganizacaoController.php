<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Organizacao;

class OrganizacaoController extends Controller
{

    public function indexView()
    {
        return view('organizacaos.index');
    }


    public function index()
    {
        $registros = Organizacao::all();
        return $registros->toJson();
        //return view('admin.organizacaos.index',compact('registros'));
    }

    public function adicionar()
    {
        return view('organizacaos.adicionar');
    }

    public function store(Request $request)
    {
        $prod = new Organizacao();
        $prod->nome = $request->input('nome');
        $prod->save();
        return json_encode($prod);
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        Organizacao::create($dados);

        return redirect()->route('organizacaos');
    }

    public function show($id)
    {
        $prod = Organizacao::find($id);
        if(isset($prod)) {
            return json_encode($prod);
        }
        return response('Organização não encontrada', 404);
    }
    public function edit($id)
    {

        $registro = Organizacao::find($id);
        return view('organizacaos.edit', compact('registro'));
    }


    public function update(Request $request,$id)
    {
        $prod = Organizacao::find($id);
        if(isset($prod)) {
            $prod->nome = $request->input('nome');
            $prod->save();
            return json_encode($prod);
        }
        return response('Organização não encontrada', 404);
    }

    public function destroy($id)
    {
        $prod = Organizacao::find($id);
        if(isset($prod)) {
            $prod->delete();
            return response('OK', 200);
        }
        return response('Organização não encontrada', 404);
    }

}
