<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoManutencao extends Model
{
    use HasFactory;

    protected $fillable = ['registro_id', 'estado', 'data'];

    public function manutencao()
    {
        return $this->belongsTo(Registro::class);
    }

    // public function estadoAtual()
    // {
    //     return $this->hasOne(EstadoManutencao::class)->orderByDesc('data')->first();
    // }
}
