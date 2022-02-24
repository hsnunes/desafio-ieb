<?php

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
/**
 * Rota para aceso a lista de clientes
 */
Route::get('/clientes', 'ClientesController@index');

/**
 * Rota para acesso ao formulário de cadastro de clientes
 */
Route::get('/clientes/create', 'ClientesController@create');

/**
 * Rota para receber os dados do formulário de cadastro de clientes e salvar no banco
 * Utilização do verbo POST, para recebimento de dados;
 * Os dados serão enviados para o metodo STORE (convenção) do framework para gravação
 */
Route::post('/clientes/create', 'ClientesController@store');

/**
 * Rota utilizada para exclusão de registros passados por ID de cliente
 */
Route::delete('/clientes/{id}', 'ClientesController@destroy');

Route::get('/clientes/{id}/editar', 'ClientesController@edit');

Route::put('/clientes/{id}', 'ClientesController@update');

Route::post('/clientes/busca', 'ClientesController@busca');