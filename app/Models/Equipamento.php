<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;
    protected $fillable = ['nome_cliente','marca','modelo'];

    public function registro() {
        return $this->hasMany(Registro::class);
    }

}


