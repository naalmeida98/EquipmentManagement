@extends('app')

@section('content')

<div class="p-5">

    <h2>Lista de Manutenções</h2>

    @if(Auth::check())
    <a class="btn btn-primary p-3 m-3 w-30" style="background-color: #63625F; border-color:#63625F" href="/manutencoes/create_form">Cadastrar</a>
    @endif

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
                <th>Valor Total</th>
                @if(Auth::check())
                <th>Ação</th>
                @endif
            </tr>
        </thead>

        <tbody>

            @foreach($manutencoes as $m)

            @php
                $estadoAtual = $m->ultimoEstado()->orderBy('updated_at', 'desc')->first();
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
                <td>R$ {{ $m->value_total }} </td>
                @if(Auth::check())
                <td>
                    <div class="d-flex flex-row g-2">

                        <div class="p-2">
                            <a href="{{ route('registros.close_commands', $m->id) }}" class="btn btn-primary">Fechar comanda</a>
                        </div>

                        <div class="p-2">
                            <a href="{{ route('registros.edit_estado', [$m->id, $estadoAtual]) }}" class="btn btn-primary">Mudar estado</a>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('edit_new', $m->id) }}" class="btn btn-primary">Editar</a>
                        </div>
                        <div class="p-2">
                            <form action="{{ route('destroy_new', $m->id) }}" method="post">

                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Excluir" class="btn btn-danger">

                            </form>
                        </div>

                    </div>
                </td>
                @endif

            </tr>

            @endforeach

        </tbody>

    </table>

</div>


@endsection
