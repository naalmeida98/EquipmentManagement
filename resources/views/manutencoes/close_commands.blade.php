@extends('app')

@section('content')

<div class="container">
    <main>
        <div class="col-md-7 col-lg-12 my-5">
            <h4 class="mb-3" style="color: #696969;">Fechar comanda manutenção</h4>
            <form  method="POST" action="{{ route('registros.calcular_valor', $manutencao->id) }}">

                @csrf

                <div class="col-sm-6">
                        <label for="registro_id" class="form-label">Id do Equipamento</label>
                        <input type="text" class="form-control" id="registro_id" name="registro_id" required="" value="{{ $manutencao->id }}"></input>
                </div>

                <div class="col-sm-6">
                        <label for="tipo" class="form-label">Tipo de manutenção</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" required="" value="{{ $manutencao->tipo }}"></input>
                </div>

                <div class="col-sm-6">
                        <label for="base_value" class="form-label">Valor base</label>
                        <input type="text" class="form-control" id="base_value" name="base_value" required="" ></input>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit" style="background-color: #636257;  border-color: #636257;">Calcular valor total</button>
            </form>
        </div>
</div>
</main>

</div>

@endsection
