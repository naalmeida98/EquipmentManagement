<?php

namespace Database\Factories;

use App\Models\Equipamento;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipamento>
 */
interface EquipamentoFactory extends Equipamento
{
    public function fabricaEquipamento(HttpRequest $request): Equipamento;
}
