<?php

namespace App\Http\Facade;

use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Models\Equipamento;
use App\Models\EstadoManutencao;
use App\Models\Registro;

class ManutençãoFacade
{

    public function __construct(){

    }

    public function indexManutenção()
    {
        $manutencoes = Registro::orderBy('datalimite')->paginate(20);
        return $manutencoes;
    }

    public function storeManutenção(StoreRegistroRequest $request)
    {
        // dd($request);
        $registro = Registro::create($request->all());
        $estado = new EstadoManutencao();
        $estado->registro_id = $registro->id;
        $estado->estado = 'Aberto';
        $estado->data = now();
        $estado->save();

    }

    public function createManutenção()
    {
        $equipamentos = Equipamento::orderBy('modelo');
        return $equipamentos;
    }

    public function updateManutenção(UpdateRegistroRequest $request, Registro $registro)
    {
        $registro->fill($request->all());
        if ($registro->save()) {
            session()->flash('mensagem', 'Manutenção atualizada com sucesso!');
            return true;
        } else {
            session()->flash('mensagem-erro', 'Erro na atualização da manutenção!');
            return false;
        }
    }

    public function destroyManutenção(Registro $registro)
    {
        if($registro->delete()) {
            session()->flash('mensagem', 'Mnutenção excluída com sucesso!');
            return true;
        } else {
            session()->flash('mensagem-erro', 'Erro na exclusão do manutenção!');
            return false;
        }
    }


}
