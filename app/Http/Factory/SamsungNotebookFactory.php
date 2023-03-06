<?php

namespace App\Http\Factory;

use App\Models\AppleNotebook;
use App\Models\SamsungNotebook;
use Exception;


class SamsungNotebookFactory implements NotebookFactory {
    public function createNotebook($model) {
        return new SamsungNotebook($model);
    }
}




