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

// class NotebookFactory
// {
//     public static function create($marca, $modelo)
//     {
//         switch ($marca) {
//             case 'Samsung':
//                 $notebook = new SamsungNotebook($marca, $modelo);
//                 break;
//             case 'Apple':
//                 $notebook = new AppleNotebook($marca, $modelo);
//                 break;
//             default:
//                 throw new Exception('Marca de notebook inválida');
//         }

//         return $notebook->build();
//     }
// }



