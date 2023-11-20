<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Agendamento;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct()
    
    {

        $this->middleware('auth');

    }
    
    public function index(Request $request)
    {
        $clientes = Cliente::where('nome', 'like', '%'.$request->buscaCliente.'%')->orderBy('nome','asc')->paginate(10);
        $servicos = Servico::all()->sortBy('descricao');
        $agendamentos = Agendamento::all()->sortBy('nome');
        $totalClientes = Cliente::all()->count();
        return view('admin.clientes.index', compact('clientes', 'totalClientes', 'agendamentos', 'servicos'));
    }

    public function create()
    {

        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        $input = $request->toArray(); // Recebe um array com os campos do formulário

        Cliente::create($input);

        return redirect()->route('admin.clientes.index')->with('sucesso', 'Cliente Cadastrado com sucesso');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.show', compact('cliente'));
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.edit', compact('cliente'));

    }

    public function update(Request $request, $id)
    {
        $input = $request->toArray();
        $cliente = Cliente:: find($id);
        $cliente->fill($input);
        $cliente->save();
        return redirect()->route('admin.clientes.index')->with('sucesso', 'Cliente alterado com sucesso!');
    }


    public function destroy($id){

        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('sucesso','Cliente deletado com sucesso!');
    }
}
