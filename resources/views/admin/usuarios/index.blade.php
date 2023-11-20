@extends('layouts.default')

@section('title', 'Usuários')

@section('conteudo')

    <div class="container shadow-sm position-relative bg-white pb-3 px-4 rounded-4 overflow-hidden"
        style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-4 mb-4">Usuários</h2>

        @if (Session::get('sucesso'))
            <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
        @endif

        <a title="Cadastrar" href="{{ route('admin.usuarios.create') }}"
            class="btn btn-primary position-absolute top-0 end-0 m-4 rounded-circle fs-4" title="Cadastrar usuário"><i
                class="bi bi-person-plus-fill fs-4"></i></a>

        <p>Total de Usuários: {{ $totalUsuarios }}</p>
        @if ($usuarios->count() == 0)
            <div class="text-center alert alert-warning">Nenhum usuário cadastrado!</div>
        @else
            <form action="" method="get" class="mb-3 d-flex justify-content-end">

                <div class="input-group me-3">
                    <input type="text" name="buscaUsuario" class="search form-control form-control-lg"
                        placeholder="Nome do usuário">
                    <button class="btn btn-primary btn-lg" title="Pesquisar" type="submit"><i
                            class="bi bi-search fs-4"></i></button>
                </div>

                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-light border btn-lg">Limpar</a>
            </form>

            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead class="" style="background-color: #24262F; color: #FFF;">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            {{-- <th>Status</th> --}}
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="align-middle text-capitalize">{{ $usuario->nome }}</td>
                                <td class="align-middle">{{ $usuario->email }}</td>
                                <td class="align-middle text-capitalize">{{ $usuario->tipo }}</td>
                                {{-- <td class="align-middle text-capitalize">{{ $usuario->status }}</td> --}}
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.usuarios.edit', $usuario->id) }} }}" class="btn btn-primary"
                                        title="Editar"><i class="bi bi-pen"></i></a>
                                    <a href="{{ route('admin.usuarios.destroy', $usuario->id) }}" class="btn btn-danger"
                                        title="Excluir" data-bs-toggle="modal"
                                        data-bs-target="#modal-deletar-{{ $usuario->id }}"><i class="bi bi-trash"></i></a>

                                    @include('admin.usuarios.delete')
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
            {{ $usuarios->links() }}

        </div>

    </div>



    </div>
@endsection
