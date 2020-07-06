<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacao extends Model
{
    protected $fillable = [
        'nome'
    ];

    public static function listarRegistros($parametros=null){
        if (isset($parametros['filtro'])){
            $dados = \DB::table('organizacaos')
            ->select(
                'organizacaos.*')
                ->orWhere('organizacaos.nome','like','%'.$parametros['filtro'].'%')
                ->get();
        } else {
            $dados = \DB::table('organizacaos')
            ->select(
                'organizacaos.*')
                ->get();
        }
        //dd($dados);
        $resultado = [];
        $resultado['data']=$dados;
        return $resultado;
//        return $texto;
    }
}
