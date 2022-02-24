<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    /**
     * Método inicial da entidade Cliente, mostra a listagem e botões para iteração com os clientes cadastrados
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

        /**
         * Metodo para retornar uma Collection de dados de Cliente ordenados
         * Onde também é retornado um objeto de Cliente;
         */
        // $clientes = Cliente::query()
        //                      ->orderBy('nome')
        //                      ->get();
        $clientes = Cliente::paginate(10);

        $mensagem = $request->session()
                                ->get("mensagem");

        // Retorna os dados para uma pagina de listagem de clientes, passando esses dados como parametro
        return view('clientes.index', compact('clientes', 'mensagem'));
    }

    /**
     * Método para o formulário de criação de Clientes
     *
     * @return void
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Método para gravação dos dados do formulario de clientes
     * @param Request $request;
     * @return void
     */
    public function store(Request $request)
    {

        // $request->validate(['nome' => required]);

        $cliente = Cliente::create($request->all());

        $request->session()
                     ->flash(
                         "mensagem", 
                         "Cliente {$cliente->nome} cadastrado com sucesso!"
        );

        return redirect('/clientes');

    }

    public function destroy(Request $request)
    {
        Cliente::destroy($request->id);
        $request->session()
                     ->flash(
                         "mensagem", 
                         "Cliente removido com sucesso!"
        );
        return redirect('/clientes');
    }

    public function edit(Request $request)
    {
        $cliente = Cliente::find($request->id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request)
    {

        $cliente = Cliente::find($request->id);

        $cliente->update($request->all());

        $request->session()
                     ->flash(
                         "mensagem", 
                         "Cliente {$cliente->nome} Atualizado com sucesso!"
        );
        return redirect('/clientes');
    }

    public function busca(Request $requrest)
    {

        $cpf = $request->busca;

        $cliente = Cliente::where('cpf', 'LIKE', "%{$cpf}")->get();

        return view('clientes.index', compact('cliente'));
    }
}
