@extends('layout')

@section('title')
Clientes - Editar
@endsection

@section('descricao')
Clientes - Editar
@endsection

@section('conteudo')
        <form method="post" action="/clientes/{{ $cliente->id }}">
            {{-- diretiva utilizada para autorização do formulário --}}
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomeCliente">Nome:</label>
                <input type="text" value="{{ $cliente->nome }}" name="nome" id="nomeCliente" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomeCPF">CPF:</label>
                <input type="text" value="{{ $cliente->cpf }}" name="cpf" id="nomeCPF" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomeEmail">Email:</label>
                <input type="email" value="{{ $cliente->email }}" name="email" id="nomeEmail" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomeFone">Telefone:</label>
                <input type="text" value="{{ $cliente->telefone }}" name="telefone" id="nomeFone" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomeEndereco">Endereço:</label>
                <textarea rows="3" name="endereco" id="nomeEndereco" class="form-control">{{ $cliente->endereco }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
        </form>
@endsection