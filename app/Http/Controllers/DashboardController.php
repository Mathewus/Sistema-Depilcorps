<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Agendamento;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    
    {

        $this->middleware('auth');

    }

    public function index()
    {

        $totalClientes = Cliente::all()->count();
        $totalAgendamentos = Agendamento::all()->count();
        $totalUsuarios = User::all()->count();
        return view('admin.dashboard.index' , compact('totalClientes','totalAgendamentos','totalUsuarios'));

    }
    
}
