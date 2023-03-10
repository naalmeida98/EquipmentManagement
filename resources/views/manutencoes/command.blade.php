@extends('app')

@section('content')

<div class="p-5">

    <h2>Resumo da comanda</h2>

    <table class="table table-stripped table-hover">

        <thead>
            <tr>
                <th>Cod</th>
                <th>Data Limite</th>
                <th>Equipamento</th>
                <th>Usuário</th>
                <th>Tipo da Manutenção</th>
                <th>Descrição do problema</th>
                <th>Estado Atual</th>
            </tr>
        </thead>

        <tbody>

            @php
                $estadoAtual = $m->ultimoEstado()->orderBy('data', 'desc')->first();
                $estadoAtual = isset($estadoAtual->estado) ? $estadoAtual->estado : '';
            @endphp

            <tr>
                <td>{{ $m->id }}</td>
                <td>{{ $m->datalimite }}</td>
                <td>{{ $m->equipamento->nome_cliente }} - {{ $m->equipamento->modelo }}</td>
                <td>{{ $m->user->name }}</td>
                <td>{{ $m->tipo }}</td>
                <td>{{ $m->descricao }}</td>
                <td>{{ $estadoAtual }}</td>
            </tr>

        </tbody>

    </table>

    <div>
    <h4 class="mb-3" style="color: #696969;">Valor Total: R$ {{ $m->value_total }}</h4>

    <a href="{{ route('manutencoes.index') }}" class="w-100 btn btn-primary btn-lg" type="submit" style="background-color: #636257;  border-color: #636257;" >Ok</a>

</div>

</div>



@endsection
