<?php

namespace App\Http\Facade;

use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Models\Registro;

interface ManutencaoFacadeInterface
{
    public function indexManutencao();
    public function storeManutencao(StoreRegistroRequest $request);
    public function createManutencao();
    public function updateManutencao(UpdateRegistroRequest $request, Registro $registro);
    public function destroyManutencao(Registro $registro);
}
