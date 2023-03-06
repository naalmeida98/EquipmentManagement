<?php

namespace App\Http\Factory;

use App\Models\AppleNotebook;
use App\Models\SamsungNotebook;
use Exception;


class AppleNotebookFactory implements NotebookFactory {
    public function createNotebook($model) {
        return new AppleNotebook($model);
    }
}




