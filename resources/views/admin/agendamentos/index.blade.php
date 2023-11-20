@extends('layouts.default')

@section('conteudo')
    <div class="container shadow-sm position-relative bg-white pb-3 px-4 rounded-4 overflow-hidden"
        style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-4 mb-4">Agendamentos</h2>

        @if (Session::get('sucesso'))
            <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
        @endif

        <a title="Agendar" href="{{ route('admin.clientes.index') }}"
            class="btn btn-primary position-absolute top-0 end-0 m-4 rounded-circle fs-4"><i class="bi bi-plus fs-4"></i></a>

        <p>Total de Agendamentos: {{ $totalAgendamentos }}</p>

        @if ($agendamentos->count() == 0)
            <div class="text-center alert alert-warning">Nenhum agendamento cadastrado!</div>
        @else
            <form action="{{ route('admin.agendamentos.index') }}" method="GET" class="mb-3 d-flex justify-content-end">

                <div class="input-group me-3 gap-2">
                    <input type="text" name="nome" class="form-control form-control-lg"
                        placeholder="Pesquise o cliente">
                    <div class="input-ldata d-flex gap-2">
                        <input type="date" name="data" class="form-control form-control-lg">
                        <button class="btn btn-primary btn-lg" title="Pesquisar" type="submit"><i
                                class="bi bi-search fs-4"></i></button>
                        <a href="{{ route('admin.agendamentos.index') }}" class="btn btn-light border btn-lg">Limpar</a>
                    </div>

                </div>

            </form>

            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead class="" style="background-color: #24262F; color: #FFF;">
                        <tr>
                            <th>Cliente</th>
                            <th>Status</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agendamentos as $agendamento)
                            <tr>
                                <td class="align-middle text-capitalize">{{ $agendamento->cliente->nome }}</td>
                                @if ($agendamento->status == 'agendado')
                                    <td class="align-middle"><span
                                            class="rounded border border-success text-capitalize text-success p-2">{{ $agendamento->status }}</span>
                                    </td>
                                @elseif ($agendamento->status == 'cancelado')
                                    <td class="align-middle"><span
                                            class="rounded border border-danger text-capitalize text-danger p-2">{{ $agendamento->status }}</span>
                                    </td>
                                @elseif ($agendamento->status == 'finalizado')
                                    <td class="align-middle"><span
                                            class="rounded border border-primary text-capitalize text-primary p-2">{{ $agendamento->status }}</span>
                                    </td>
                                @endif

                                <td class="align-middle">R$ {{$agendamento->valor_total}}</td>
                                <td class="align-middle">@php echo date('d/m/y', strtotime($agendamento->data))@endphp</td>
                                <td class="align-middle">{{ $agendamento->hora }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.agendamentos.show', $agendamento->id) }}"
                                        class="btn btn-warning text-white" title="Detalhar">
                                        <i class="bi bi-card-list"></i></a>
                                    <a href="{{ route('admin.agendamentos.edit', $agendamento->id) }}"
                                        class="btn btn-primary" title="Editar">
                                        <i class="bi bi-pen"></i></a>
                                    @can('acessar-usuarios')
                                        <a href="{{ route('admin.agendamentos.destroy', $agendamento->id) }}"
                                            class="btn btn-danger" title="Excluir" data-bs-toggle="modal"
                                            data-bs-target="#modal-deletar-{{ $agendamento->id }}">
                                            <i class="bi bi-trash"></i></a>
                                    @endcan

                                    @include('admin.agendamentos.delete')
                                </td>
                            </tr>
                        @endforeach
        @endif
        </tbody>

        </table>

        <div>
            <style>
                .pagination {
                    justify-content: center;
                }
            </style>
            {{ $agendamentos->links() }}

        </div>

    </div>
    </div>
@endsection
