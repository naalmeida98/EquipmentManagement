@extends('app')

@section('content')

<div class="container">
    <main>
        <div class="col-md-7 col-lg-12 my-5">
            <h4 class="mb-3" style="color: #696969;">Adicionar novo equipamento</h4>
            <form action="{{ route('equipamentos.update', $equipamento->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-sm-12">
                        <label for="nome_cliente" class="form-label">Nome do cliente</label>
                        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" placeholder="" value="" required="">
                    </div>

                </div>

                <div class="col-sm-12">
                        <label for="marca" class="form-label">Marca</label>
                        <select class="form-select" id="marca" name="marca" >
                            <option value="select">Selecione</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Apple">Apple</option>
                        </select>
                </div>

                <div class="row g-3">

                    <div class="col-sm-12">
                        <label for="nome" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="" value="" required="">
                    </div>

                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit" style="background-color: #636257;  border-color: #636257;">Editar</button>
            </form>
        </div>
</div>
</main>

</div>

@endsection
