<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

interface Notebook {

    
    public function getBrand();
    public function getModel();
}


// abstract class Notebook
// {
//     protected $marca;
//     protected $modelo;

//     public function __construct()
//     {
//     }

//     public function setMarca($marca)
//     {
//         $this->marca = $marca;
//     }

//     public function setModelo($modelo)
//     {
//         $this->modelo = $modelo;
//     }

//     abstract public function build();
// }


