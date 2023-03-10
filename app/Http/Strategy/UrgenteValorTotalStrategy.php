<?php

namespace App\Http\Strategy;

class UrgenteValorTotalStrategy implements ValorTotalStrategy {
    public function calcularValorTotal($valorBase) {
        return $valorBase * 1.1;
    }
}
