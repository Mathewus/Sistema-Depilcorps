@extends('layouts.default')

@section('conteudo')
    <div class="container shadow-sm position-relative bg-white pb-3 px-4 rounded-4 overflow-hidden"
        style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-4 mb-4">Serviços</h2>

        @if (Session::get('sucesso'))
            <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
        @endif

        <a title="Cadastrar" href="{{ route('admin.servicos.create') }}"
            class="btn btn-primary position-absolute top-0 end-0 m-4 rounded-circle fs-4"><i class="bi bi-plus fs-4"></i></a>

        <p>Total de Serviços: {{ $totalServicos }}</p>

        @if ($servicos->count() == 0)
            <div class="text-center alert alert-warning">Nenhum serviço cadastrado!</div>
        @else
            <form action="" method="get" class="mb-3 d-flex justify-content-end">
                <div class="input-group me-3">
                    <input type="text" name="buscaServico" class="form-control form-control-lg"
                        placeholder="Nome do serviço">
                    <button class="btn btn-primary btn-lg" title="Pesquisar" type="submit"><i
                            class="bi bi-search fs-4"></i></button>
                </div>
                <a href="{{ route('admin.servicos.index') }}" class="btn btn-light border btn-lg" title="Limpar">Limpar</a>
            </form>

            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead class="" style="background-color: #24262F; color: #FFF;">
                        <tr>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicos as $servico)
                            <tr>
                                <td class="align-middle text-capitalize">{{ $servico->descricao }}</td>
                                <td class="align-middle w-50">{{ $servico->preco }}</td>
                                <td class="align-middle w-25">
                                    <a href="{{ route('admin.servicos.edit', $servico->id) }}" class="btn btn-primary"
                                        title="Editar">
                                        <i class="bi bi-pen"></i></a>
                                    <a href="{{ route('admin.servicos.destroy', $servico->id) }}" class="btn btn-danger"
                                        title="Excluir" data-bs-toggle="modal"
                                        data-bs-target="#modal-deletar-{{ $servico->id }}">
                                        <i class="bi bi-trash"></i></a>

                                    @include('admin.servicos.delete')
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
            {{ $servicos->links() }}

        </div>

        </div>
    </div>
@endsection
