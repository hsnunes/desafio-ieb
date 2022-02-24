@extends('layout')

@section('title')
Clientes - Cadastro
@endsection

@section('descricao')
Clientes - Cadastrar
@endsection


@section('conteudo')
        <form method="post">
            {{-- diretiva utilizada para autorização do formulário --}}
            @csrf
            <div class="form-group">
                <label for="nomeCliente">Nome:</label>
                <input type="text" name="nome" id="nomeCliente" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomeCPF">CPF:</label>
                <input type="text" name="cpf" id="nomeCPF" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomeEmail">Email:</label>
                <input type="email" name="email" id="nomeEmail" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomeFone">Telefone:</label>
                <input type="text" name="telefone" id="nomeFone" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomeEndereco">Endereço:</label>
                <textarea rows="3" name="endereco" id="nomeEndereco" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
        </form>
@endsection