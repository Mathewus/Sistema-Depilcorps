@extends('layouts.default')

@section('conteudo')
    <div class="container shadow-sm position-relative bg-white pb-3 px-4 rounded-4 overflow-hidden"
        style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-4 mb-4">Clientes</h2>

        @if (Session::get('sucesso'))
            <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
        @endif

        <a title="Cadastrar" href="{{ route('admin.clientes.create') }}"
            class="btn btn-primary position-absolute top-0 end-0 m-4 rounded-circle fs-4"><i
                class="bi bi-person-plus-fill"></i></a>

        <p>Total de Clientes: {{ $totalClientes }}</p>

        @if ($clientes->count() == 0)
            <div class="text-center alert alert-warning">Nenhum cliente cadastrado!</div>
        @else
            <form action="" method="get" class="mb-3 d-flex justify-content-end">

                <div class="input-group me-3">
                    <input type="text" name="buscaCliente" class="form-control form-control-lg"
                        placeholder="Nome do cliente">
                    <button class="btn btn-primary btn-lg" title="Pesquisar" type="submit"><i
                            class="bi bi-search fs-4"></i></button>
                </div>

                <a href="{{ route('admin.clientes.index') }}" class="btn btn-light border btn-lg">Limpar</a>
            </form>

            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead class="" style="background-color: #24262F; color: #FFF;">
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="align-middle text-capitalize">{{ $cliente->nome }}</td>
                                <td class="align-middle w-50">{{ $cliente->telefone }}</td>
                                <td class="align-middle w-25">
                                    <a href="{{ route('admin.clientes.show', $cliente->id) }}"
                                        class="btn btn-warning text-white" title="Detalhar">
                                        <i class="bi bi-card-list"></i></a>

                                    @if ($servicos->count() == 0)
                                        <a href=""
                                            class="btn btn-success" title="Agendar" data-bs-toggle="modal"
                                            data-bs-target="#modalSemServicos">
                                            <i class="bi bi-calendar-plus"></i></a>
                                        @include('admin.servicos.alert')
                                    @else
                                        <a href="{{ route('admin.agendamentos.create', $cliente->id) }}"
                                            class="btn btn-success" title="Agendar">
                                            <i class="bi bi-calendar-plus"></i></a>
                                    @endif
                                    <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-primary"
                                        title="Editar">
                                        <i class="bi bi-pen"></i></a>
                                    @can('acessar-usuarios')
                                            <a href="{{ route('admin.clientes.destroy', $cliente->id) }}"
                                                class="btn btn-danger" title="Excluir" data-bs-toggle="modal"
                                                data-bs-target="#modal-deletar-{{ $cliente->id }}">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                    @endcan
                                    @include('admin.clientes.delete')
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
            {{ $clientes->links() }}

        </div>

    </div>
    </div>
@endsection
