<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//SITE

// Route::get('/', [SiteController::class, 'index'])->name('site.index');


//ROTA DE LOGIN

Route::get('/', [LoginController::class, 'index'])->name('admin.login.index');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


//ROTAS USUÁRIOS

Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index');

Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('admin.usuarios.create');

Route::post('/admin/usuarios', [UsuarioController::class, 'store'])->name('admin.usuarios.store');

Route::get('/admin/usuarios/edit/{id}', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit'); // Formulário de edição

Route::put('/admin/usuarios/{id}', [UsuarioController::class, 'update'])->name('admin.usuarios.update'); // Rota para atualização do registro no banco

Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy'); // Rota para atualização do registro no banco


//ROTAS DASHBOARD

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');


// ROTAS CLIENTES

Route::get('/admin/clientes', [ClienteController::class, 'index'])->name('admin.clientes.index');

Route::get('/admin/clientes/create', [ClienteController::class, 'create'])->name('admin.clientes.create');

Route::post('/admin/clientes', [ClienteController::class, 'store'])->name('admin.clientes.store');

Route::get('/admin/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('admin.clientes.edit'); // Formulário de edição

Route::get('/admin/clientes/show/{id}', [ClienteController::class, 'show'])->name('admin.clientes.show');

Route::put('/admin/clientes/{id}', [ClienteController::class, 'update'])->name('admin.clientes.update'); // Rota para atualização do registro no banco

Route::delete('/admin/clientes/{id}', [ClienteController::class, 'destroy'])->name('admin.clientes.destroy'); // Rota para atualização do registro no banco


// ROTAS AGENDAMENTOS

Route::get('/admin/agendamentos', [AgendamentoController::class, 'index'])->name('admin.agendamentos.index');

Route::get('/admin/agendamentos/create/{id}', [AgendamentoController::class, 'create'])->name('admin.agendamentos.create');

Route::post('/admin/agendamentos', [AgendamentoController::class, 'store'])->name('admin.agendamentos.store');

Route::get('/admin/agendamentos/edit/{id}', [AgendamentoController::class, 'edit'])->name('admin.agendamentos.edit'); // Formulário de edição

Route::get('/admin/agendamentos/show/{id}', [AgendamentoController::class, 'show'])->name('admin.agendamentos.show');

Route::put('/admin/agendamentos/{id}', [AgendamentoController::class, 'update'])->name('admin.agendamentos.update'); // Rota para atualização do registro no banco

Route::delete('/admin/agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('admin.agendamentos.destroy'); // Rota para atualização do registro no banco


// ROTAS SERVICOS

Route::get('/admin/servicos', [ServicoController::class, 'index'])->name('admin.servicos.index');

Route::get('/admin/servicos/create', [ServicoController::class, 'create'])->name('admin.servicos.create');

Route::post('/admin/servicos', [ServicoController::class, 'store'])->name('admin.servicos.store');

Route::get('/admin/servicos/edit/{id}', [ServicoController::class, 'edit'])->name('admin.servicos.edit'); // Formulário de edição

Route::put('/admin/servicos/{id}', [ServicoController::class, 'update'])->name('admin.servicos.update'); // Rota para atualização do registro no banco

Route::delete('/admin/servicos/{id}', [ServicoController::class, 'destroy'])->name('admin.servicos.destroy'); // Rota para atualização do registro no banco




// Route::get('/', function () {
//     return view('welcome');
// });