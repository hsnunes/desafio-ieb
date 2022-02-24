@extends('layout')

@section('titulo')
Clientes - Gerência
@endsection

@section('descricao')
Clientes - Gerência
@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('conteudo')
    @if (!empty($mensagem))
    <div class="alert alert-secondary">
    {{$mensagem}}
    </div>
    @endif

    <div class="row">
    <div class="col-6">
        <a href="/clientes/create" class="btn btn-dark mb-2">Adicionar</a>
    </div>
    <div class="col-6">
        <form method="post" action="/clientes/busca" class="form form-inline">
            @csrf
            <input name="busca" type="text" class="" placeholder="000.000.000-00">
            <button type='submit' class="btn btn-info">Buscar</button>
        </form>
    </div>
    </div>

    <ul class="list-group">
    @foreach ($clientes as $cliente)
        <li class="list-group-item d-flex justify-content-between">
            {{$cliente->nome}}
            <div class="d-flex">
                <a href="/clientes/{{$cliente->id}}/editar" class="mx-2">
                    <button class="btn btn-secondary">Editar</button>
                </a>
                <form action="/clientes/{{$cliente->id}}" method="POST" onsubmit="return confirm('Deseja mesmo remover o Cliente {{addslashes($cliente->nome)}}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </li>
    @endforeach
    </ul>

    {!! $clientes->links() !!}
@endsection