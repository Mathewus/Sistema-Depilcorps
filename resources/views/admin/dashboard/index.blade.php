@extends('layouts.default')

@section('conteudo')

<div style="margin-top: -40px">

<h1 class="mb-5">Dashboard</h1>

    <div class="row g-5">
        <div class="col-md-4">
            <div class="bg-primary shadow p-3 text-center text-white">
                <i class="bi bi-person-bounding-box fs-1"></i>
                <h2 class="fs-4">Clientes</h2>
                <h3 class="fs-1">{{ $totalClientes }}</h3>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="bg-success shadow p-3 text-center text-white">
                <i class="bi bi-calendar-check fs-1"></i>
                <h2 class="fs-4">Agendamentos</h2>
                <h3 class="fs-1">{{ $totalAgendamentos }}</h3>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="bg-warning shadow p-3 text-center text-white">
                <i class="bi bi-people-fill fs-1"></i>
                <h2 class="fs-4">Usuários</h2>
                <h3 class="fs-1">{{ $totalUsuarios }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection