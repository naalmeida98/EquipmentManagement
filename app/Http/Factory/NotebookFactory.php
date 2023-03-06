<?php

namespace App\Http\Factory;

use App\Models\AppleNotebook;
use App\Models\SamsungNotebook;
use Exception;


interface NotebookFactory {
    public function createNotebook($model);
}




