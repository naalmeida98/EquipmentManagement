@extends('app')

@section('content')

<div class="container">
    <main>
        <div class="col-md-7 col-lg-12 my-5">
            <h4 class="mb-3" style="color: #696969;">Editar manutenção</h4>
            <form  method="POST" action="{{ route('manutencoes.update', $manutencao[0]->id) }}">

                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="equipamento_id" class="form-label">Id do Equipamento</label>
                        <input type="text" class="form-control" id="equipamento_id" name="equipamento_id" required="" value="{{ $manutencao[0]->equipamento_id }}"></input>
                    </div>
                    <div class="col-6">
                        <label for="datalimite" class="form-label">Data Limite</label>
                        <input type="date" class="form-control" id="datalimite" name="datalimite" required="" value="{{ $manutencao[0]->datalimite }}"></input>
                    </div>

                    <div class="col-12">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" required="" value="{{ $manutencao[0]->descricao }}"></input>
                    </div>

                    <div class="col-sm-8">
                        <label for="tipo" class="form-label">Tipo da manutenção</label>
                        <select class="form-select" id="tipo" name="tipo">
                            <option value="select">Selecione</option>
                            <option value="Preventiva">Preventiva</option>
                            <option value="Corretiva">Corretiva</option>
                            <option value="Urgente">Urgente</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="user_id" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="" required="" value="{{ Auth::user()->id }}" >
                    </div>

                </div>

                <div class="col-sm-12">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado">
                            <option value="Aberto">Aberto</option>
                            <option value="Em manutenção">Em manutenção</option>
                            <option value="Finalizado">Finalizado</option>
                        </select></div>
                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit" style="background-color: #636257;  border-color: #636257;">Editar</button>
            </form>
        </div>
</div>
</main>

</div>

@endsection
