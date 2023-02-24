<?php

namespace App\Models;

use App\Models\Equipamento as ModelsEquipamento;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppleNotebook implements Notebook
{

    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getBrand() {
        return 'Apple';
    }

    public function getModel() {
        return $this->model;
    }

    // public function build()
    // {
    //     return new Notebook('Apple', $this->modelo);
    // }
}
