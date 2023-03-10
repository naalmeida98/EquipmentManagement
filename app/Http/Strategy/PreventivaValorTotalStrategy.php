<?php

namespace App\Http\Strategy;

class PreventivaValorTotalStrategy implements ValorTotalStrategy {
    public function calcularValorTotal($valorBase) {
        return $valorBase;
    }
}
