<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/organizacaos', ['as' => 'organizacaos', 'uses' =>'OrganizacaoController@index']);
Route::get('/organizacaos', ['as' => 'organizacaos', 'uses' =>'OrganizacaoController@indexView']);
Route::get('/organizacaos/adicionar', ['as'=>'organizacaos.adicionar', 'uses'=>'OrganizacaoController@adicionar']);
Route::post('/organizacaos/salvar', ['as' => 'organizacaos.salvar', 'uses' =>'OrganizacaoController@salvar']);
Route::get('/organizacaos/editar/{id}', ['as'=>'organizacaos.editar', 'uses'=>'OrganizacaoController@edit']);

Route::put('/organizacaos/atualizar/{id}', ['as'=>'organizacaos.atualizar', 'uses'=>'OrganizacaoController@update']);

Route::get('/organizacaos/deletar/{id}', ['as' => 'organizacaos.deletar', 'uses' =>'OrganizacaoController@destroy']);
