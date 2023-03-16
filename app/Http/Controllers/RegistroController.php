<?php

namespace App\Http\Controllers;

use App\Http\Adapter\ManutençãoAdapter;
use App\Http\Facade\ManutençãoFacade;
use App\Models\Registro;
use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Http\Strategy\CorretivaValorTotalStrategy;
use App\Http\Strategy\PreventivaValorTotalStrategy;
use App\Http\Strategy\UrgenteValorTotalStrategy;
use App\Models\Equipamento;
use App\Models\EstadoManutencao;
use App\Models\User;
use Illuminate\Http\Request;

class RegistroController extends Controller
{

    protected $manutencaoFacade;
    protected $manutençãoAdapter;


    public function __construct(ManutençãoFacade $manutencaoFacade,
                                ManutençãoAdapter $manutençãoAdapter)
    {
        $this->middleware('auth')->except('index');
        $this->manutencaoFacade = $manutencaoFacade;
        $this->manutençãoAdapter = $manutençãoAdapter;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manutencoes = $this->manutencaoFacade->indexManutenção();
        return view('manutencoes.index', ['manutencoes' => $manutencoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipamentos = $this->manutencaoFacade->createManutenção();
        view('manutencoes.create',['equipamentos' => $equipamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistroRequest $request)
    {
        // dd($request);
        $type_adapted = $this->manutençãoAdapter->adapter_numberForType($request->input('tipo'));
        $request->merge(['tipo' => $type_adapted]);
        $this->manutencaoFacade->storeManutenção($request);
        return redirect()->route('manutencoes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        // $registro = Registro::findOrFail($registro);
        dd($registro);
        // dump('manutencao',$registro);
        return view('manutencoes.edit', ['manutencao' => $registro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistroRequest  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistroRequest $request, Registro $registro)
    {
        $registro->fill($request->all());
        if ($registro->save()) {
            session()->flash('mensagem', 'Manutenção atualizada com sucesso!');
            return redirect()->route('manutencoes.index');
        } else {
            session()->flash('mensagem-erro', 'Erro na atualização da manutenção!');
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        if($registro->estadoManutencaos()->delete() && $registro->delete()) {
            session()->flash('mensagem', 'Manutenção excluída com sucesso!');
            return redirect()->route('manutencoes.index');
        } else {
            session()->flash('mensagem-erro', 'Erro na exclusão da manutenção!');
            return back();
        }
    }

    public function mudarEstado(Request $request)
    {
        // dd($request);
        $registro_id = $request->input('registro_id');
        $novoEstado = $request->input('estado');
        // $novoEstado = $this->manutençãoAdapter->adapter_TypeForNumber($novoEstado);
        $estado = new EstadoManutencao();
        $estado->registro_id = $registro_id;
        $estado->estado = $novoEstado;
        $estado->data = now();
        $estado->save();
        $manutencoes = Registro::orderBy('datalimite')->paginate(20);
        return view('manutencoes.index', ['manutencoes' => $manutencoes]);
    }


    public function calcularValor(Request $request)
    {
        $registro_id = $request->input('registro_id');
        $base_value = $request->input('base_value');
        $tipo = $request->input('tipo');
        switch ($tipo) {
            case 'Preventiva':
                $manutencao_tipo = new PreventivaValorTotalStrategy();
                break;
            case 'Corretiva':
                $manutencao_tipo = new CorretivaValorTotalStrategy();
                break;
            case 'Urgente':
                $manutencao_tipo = new UrgenteValorTotalStrategy();
                break;
            default:
                throw new \InvalidArgumentException('Tipo de manutenção inválido');
        }

        $valorTotal = $manutencao_tipo->calcularValorTotal($base_value);

        Registro::where('id', $registro_id)->update(['value_total' => $valorTotal]);
        $registro = Registro::find($registro_id);

        return view('manutencoes.command', ['m' => $registro]);
    }


}
