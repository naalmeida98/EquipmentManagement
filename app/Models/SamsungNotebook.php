<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SamsungNotebook implements Notebook
{

    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getBrand() {
        return 'Samsung';
    }

    public function getModel() {
        return $this->model;
    }

    // public function build()
    // {
    //     return new Notebook('Samsung', $this->modelo);
    // }
}
