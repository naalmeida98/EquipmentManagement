@extends('app')

@section('content')

<div class="container">
    <main>
        <div class="col-md-7 col-lg-12 my-5">
            <h4 class="mb-3" style="color: #696969;">Editar manutenção</h4>
            <form  method="POST" action="{{ route('registros.mudar_estado') }}">

                @csrf

                <div class="col-sm-6">
                        <label for="registro_id" class="form-label">Id do Equipamento</label>
                        <input type="text" class="form-control" id="registro_id" name="registro_id" required="" value="{{ $registro_id }}"></input>
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
