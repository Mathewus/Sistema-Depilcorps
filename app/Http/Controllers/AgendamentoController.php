<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AgendamentoController extends Controller
{


    public function __construct()

    {

        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $nome = $request->nome;
        $data = $request->data;

        if ($nome != null) {
            $agendamentos = Agendamento::orWhereHas('cliente', function ($query) use ($nome) {
                $query->where('nome', 'like', '%' . $nome . '%');
            })->orderBy('data', 'asc')->paginate(10);
        } elseif ($data != null) {
            $agendamentos = Agendamento::where('data', $data)->orderBy('data', 'asc')->paginate(10);
        } else {
            $agendamentos = Agendamento::where('data', $data)->orWhereHas('cliente', function ($query) use ($nome) {
                $query->where('nome', 'like', '%' . $nome . '%');
            })->orderBy('data', 'asc')->orderBy('hora', 'asc')->paginate(10);
        }

        $totalAgendamentos = Agendamento::all()->count();
        return view('admin.agendamentos.index', compact('agendamentos', 'totalAgendamentos'));
    }


    public function create($id)
    {
        $cliente = Cliente::find($id);
        $servicos = Servico::all()->sortBy('descricao');
        $usuarios = User::all()->sortBy('nome');
        return view('admin.agendamentos.create', compact('cliente', 'usuarios', 'servicos'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray(); // Recebe um array com os campos do formulário

        // dd($input['servicos']);

        $valor_total = 0;

        foreach($input['servicos'] AS $servico_selecionado){
            $servico = Servico::find($servico_selecionado);
            $valor_total += $servico['preco'];
        }

        // dd($valor_total);
        $input['valor_total'] = $valor_total;
        $agendamento = Agendamento::create($input);

        if ($request->servicos) {
            $agendamento->servicos()->sync($input['servicos']);
        }

        return redirect()->route('admin.agendamentos.index')->with('sucesso', 'Agendamento Cadastrado com sucesso');
    }


    public function show($id)
    {
        $agendamento = Agendamento::find($id);

        return view('admin.agendamentos.show', compact('agendamento'));
    }


    public function edit($id)
    {
        $agendamento = Agendamento::find($id);

        $cliente = Cliente::all()->sortby('nome');

        $servicos_selecionados = [];
        foreach ($agendamento->servicos as $servico_selecionado) {
            $servicos_selecionados = Arr::prepend($servicos_selecionados, $servico_selecionado->id);
        }

        $servicos = Servico::all()->sortBy('descricao');
        $usuarios = User::all()->sortBy('nome');
        return view('admin.agendamentos.edit', compact('agendamento', 'cliente', 'servicos', 'usuarios', 'servicos_selecionados'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->toArray();
        $agendamento = Agendamento::find($id);

        if ($request->servicos) {
            $agendamento->servicos()->sync($input['servicos']);
        }

        $valor_total = 0;

        foreach($input['servicos'] AS $servico_selecionado){
            $servico = Servico::find($servico_selecionado);
            $valor_total += $servico['preco'];
        }

        $input['valor_total'] = $valor_total;

        $agendamento->fill($input);
        $agendamento->save();
        return redirect()->route('admin.agendamentos.index')->with('sucesso', 'Agendamento alterado com sucesso!');
    }


    public function destroy($id)
    {

        $agendamento = Agendamento::find($id);
        $agendamento->delete();
        return redirect()->route('admin.agendamentos.index')->with('sucesso', 'Agendamento deletado com sucesso!');
    }


}
