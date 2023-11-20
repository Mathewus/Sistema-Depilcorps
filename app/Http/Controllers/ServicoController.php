<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{

    public function __construct()
    
    {

        $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $servicos = Servico::where('descricao', 'like', '%'.$request->buscaServico.'%')->orderBy('descricao','asc')->paginate(10);
        
        $totalServicos = Servico::all()->count();
        return view('admin.servicos.index', compact('servicos', 'totalServicos'));
    }

    public function create()
    {
        return view('admin.servicos.create');
    }

    public function store(Request $request)
    {
        $input = $request->toArray(); // Recebe um array com os campos do formulário

        Servico::create($input);

        return redirect()->route('admin.servicos.index')->with('sucesso', 'Serviço Cadastrado com sucesso');
    }

    public function edit($id)
    {
        $servico = Servico::find($id);
        return view('admin.servicos.edit', compact('servico'));

    }

    public function update(Request $request, $id)
    {
        $input = $request->toArray();
        $servico = Servico:: find($id);
        $servico->fill($input);
        $servico->save();
        return redirect()->route('admin.servicos.index')->with('sucesso', 'Serviço alterado com sucesso!');
    }


    public function destroy($id){

        $servico = Servico::find($id);
        $servico->delete();
        return redirect()->route('admin.servicos.index')->with('sucesso','Serviço deletado com sucesso!');
    }


}
