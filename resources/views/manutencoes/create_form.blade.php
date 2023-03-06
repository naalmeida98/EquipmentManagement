@extends('app')
@section('content')
<div class="container">
        <div class="col-md-7 col-lg-12">
            <h4 class="mb-3" style="color: #696969;">Adicionar nova manutenção</h4>
            <form action="{{ route('manutencoes.store') }}" method="POST">

                @csrf

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="equipamento_id" class="form-label">Nome do Equipamento</label>
                        <select class="form-select" id="equipamento_id" name="equipamento_id">
                            <option value="select">Selecione</option>
                            @foreach($equipamentos as $e)
                            <option value="{{ $e->id }}">{{ $e->nome_cliente }} - {{ $e->modelo }}</option>
                            @endforeach
                        </select>
                    </div>

                    @yield('form')

                    <hr class="my-4">


</div>


</div>


<div class="col-6">
    <label for="datalimite" class="form-label">Data Limite</label>
    <input type="date" class="form-control" id="datalimite" name="datalimite" required=""></input>
</div>

<div class="col-12">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea type="text" class="form-control" id="descricao" name="descricao" required=""></textarea>
</div>

<div class="col-sm-8">
    <label for="tipo" class="form-label">Tipo da manutenção</label>
    <select class="form-select" id="tipo" name="tipo">
        <option value="select">Selecione</option>
        <option value="1">Preventiva</option>
        <option value="2">Corretiva</option>
        <option value="3">Urgente</option>
    </select>
</div>

<div class="col-sm-4">
    <label for="user_id" class="form-label">Usuário</label>
    <input type="number" class="form-control" id="user_id" name="user_id" placeholder="" value="{{ Auth::user()->id }}" required="">
</div>

<button class="w-100 btn btn-primary btn-lg" type="submit" style="background-color: #636257;  border-color: #636257;">Cadastrar</button>
</div>

</div>
</form>


@endsection
