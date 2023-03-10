<?php

namespace App\Http\Strategy;

class CorretivaValorTotalStrategy implements ValorTotalStrategy {
    public function calcularValorTotal($valorBase) {
        return $valorBase * 1.02;
    }
}
