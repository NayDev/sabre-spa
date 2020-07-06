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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

<<<<<<< HEAD
Route::get('/organizacaos', ['as' => 'organizacaos', 'uses' =>'OrganizacaoController@index']);
=======

Route::get('/',['as'=>'site.home','uses'=>'HomeController@index']);

>>>>>>> 7c48d1c3a032681549e2eaea091a66d5f2773c21
Route::get('/organizacaos', ['as' => 'organizacaos', 'uses' =>'OrganizacaoController@indexView']);
Route::get('/organizacaos/adicionar', ['as'=>'organizacaos.adicionar', 'uses'=>'OrganizacaoController@adicionar']);
Route::post('/organizacaos/salvar', ['as' => 'organizacaos.salvar', 'uses' =>'OrganizacaoController@salvar']);
Route::get('/organizacaos/editar/{id}', ['as'=>'organizacaos.editar', 'uses'=>'OrganizacaoController@edit']);

Route::put('/organizacaos/atualizar/{id}', ['as'=>'organizacaos.atualizar', 'uses'=>'OrganizacaoController@update']);

Route::get('/organizacaos/deletar/{id}', ['as' => 'organizacaos.deletar', 'uses' =>'OrganizacaoController@destroy']);
