<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    public function __construct()

    {

        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        Gate::authorize('acessar-usuarios');

        $usuarios = User::where('nome', 'like', '%' . $request->buscaUsuario . '%')->orderBy('nome', 'asc')->paginate(10);

        $totalUsuarios = User::all()->count();
        return view('admin.usuarios.index', compact('usuarios', 'totalUsuarios'));
    }


    public function create()
    {
        Gate::authorize('acessar-usuarios');

        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $input = $request->toArray(); // Recebe um array com os campos do formulário



        if (empty($input['foto'])) {

            $input['foto'] = null;
        } else {

            $nomeArquivo = $input['foto']->hashName(); //Obtém a hash do nome do arquivo 
            $input['foto']->store('public/usuarios'); //upload da foto em uma pasta
            $input['foto'] = $nomeArquivo; // Guardar o nome do arquivo

        }

        User::create($input);


        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário Cadastrado com sucesso');
    }

    public function edit($id)
    {
        $usuario = User::find($id);

        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {

        $input = $request->toArray();
        $usuario = User::find($id);

        if (!empty($input['foto']) && $input['foto']->isValid()) {
            Storage::delete('public/usuarios/' . $usuario['foto']);
            $nomeArquivo = $input['foto']->hashName(); //Obtém a hash do nome do arquivo 
            $input['foto']->store('public/usuarios'); //upload da foto em uma pasta
            $input['foto'] = $nomeArquivo; // Guardar o nome do arquivo
        }

        if(($input['password'] != null))
        {
            $input['password'] = bcrypt($input['password']);

        }else{

            $input['password'] = $usuario['password'];
        }

        $usuario->fill($input);
        $usuario->save();

        if ((auth()->user()->tipo === 'simples')) {
            return redirect()->route('admin.dashboard.index');
        } else {
            return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário alterado com sucesso!');
        }
    }


    public function destroy($id)
    {

        $usuario = User::find($id);
        Storage::delete('public/usuarios/' . $usuario['foto']);
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário deletado com sucesso!');
    }
}
