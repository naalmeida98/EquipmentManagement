<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\RegistroController;
use App\Models\Equipamento;
use App\Models\EstadoManutencao;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/users/index', function () {
    $users = User::orderBy('name')->paginate(20);
    return view('users.index', ['users' => $users]);
})->middleware(['auth']);

Route::get('/users/create', function () {
    return view('users.create');
})->middleware(['auth']);

Route::get('/manutencoes/create_form', function () {
    $equipamentos = Equipamento::get();
    return view('manutencoes.create_form', ['equipamentos' => $equipamentos]);
})->middleware(['auth']);

Route::get('/auth', function () {
    return view('adm');
})->middleware(['auth'])->name('dashboard');

Route::get('/rel_equip', function () {
    $equipamentos = Equipamento::get();
    return view('manutencoes.rel_equip', ['equipamentos' => $equipamentos, 'manutencoes' => '']);
})->middleware(['auth']);

Route::get('/rel_equip/{equipamento}', function ($equipamento) {
    $manutencoes = Registro::where(['equipamento_id' => $equipamento])->get();
    $equipamentos = Equipamento::get();
    return view('manutencoes.rel_equip', ['equipamentos' => $equipamentos, 'manutencoes' => $manutencoes]);
})->middleware(['auth']);

Route::get('/edit_new/{manutencao_id}', function ($manutencao_id) {
    $manutencao = Registro::where(['id' => $manutencao_id])->get();
    // dd($manutencao);
    return view('manutencoes.edit', ['manutencao' => $manutencao]);
})->name('edit_new')->middleware(['auth']);

Route::delete('/destroy_new/{manutencao_id}', function ($manutencao_id) {
    $manutencao = Registro::find($manutencao_id);
    if ($manutencao->delete()) {
        session()->flash('mensagem', 'Mnutenção excluída com sucesso!');
        return redirect()->route('manutencoes.index');
    } else {
        session()->flash('mensagem-erro', 'Erro na exclusão do manutenção!');
        return back();
    }
})->name('destroy_new')->middleware(['auth']);

Route::get('/registros/{registro_id}/mudar_estado/{estado}', function ($registro_id,$estado) {
    return view('manutencoes.edit_estado', ['registro_id' => $registro_id, '$estado' => $estado]);
})->name('registros.edit_estado');

Route::post('/registros/mudar_estado', [RegistroController::class, 'mudarEstado'])->name('registros.mudar_estado');

Route::get('/close_commands/{registro_id}', function ($registro_id) {
    $manutencao = Registro::find($registro_id);
    return view('manutencoes.close_commands', ['manutencao' => $manutencao]);
})->name('registros.close_commands');

Route::post('/valor_total/{registro_id}', [RegistroController::class, 'calcularValor'])->name('registros.calcular_valor');

require __DIR__ . '/auth.php';

Route::resource('/equipamentos', EquipamentoController::class);
Route::resource('/manutencoes', RegistroController::class);
