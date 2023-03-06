<?php

namespace App\Http\Adapter;

use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Models\Equipamento;
use App\Models\Registro;

class ManutençãoAdapter
{

    public function __construct(){

    }

    public function adapter_numberForType($number)
    {
        $type_name = '';
        if($number == '1'){
            $type_name = 'Preventiva';
        }elseif($number == '2'){
            $type_name = 'Corretiva';
        }else{
            $type_name = 'Urgente';
        }
        return $type_name;
    }

    public function adapter_TypeForNumber($type_name)
    {
        $number = -1;
        if($type_name == 'Preventiva'){
            $number = 1;
        }elseif($type_name == 'Corretiva'){
            $number = 2;
        }else{
            $number = 3;
        }
        return $number;
    }


}
