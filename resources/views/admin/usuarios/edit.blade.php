@extends('layouts.default')

@section('conteudo')
    <div class="container shadow bg-white pb-4 px- rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-4">Alterar Usuário</h2>

        <form method="POST" action="{{ route('admin.usuarios.update', $usuario->id) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="row pt-3">
                <div class="mb-3 col-sm-6">
                    <label for="nome" class="form-label fs-5 fs-5">Nome</label>
                    <input type="text" class="form-control form-control-lg bg-light" value="{{ $usuario->nome }}"
                        id="name" name="nome">
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="email" class="form-label fs-5 fs-5">E-mail</label>
                    <input type="text" class="form-control form-control-lg bg-light" value="{{ $usuario->email }}"
                        id="email" name="email">
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="password" class="form-label fs-5 fs-5">Senha</label>
                    <div class="d-flex justify-content-end align-items-center">
                        <input type="password" class="password form-control form-control-lg bg-light" value=""
                            id="password" name="password">
                        <div class="icon">
                            <img class="icon-image" onclick="showhide()" src="/images/layout/show.png" width="30px"
                                height="30px" alt="">
                        </div>
                    </div>

                </div>
                @can('acessar-usuarios')
                    <div class="mb-3 col-sm-6">
                        <label for="tipo" class="form-label fs-5 fs-5">Tipo do usuário</label>
                        <select name="tipo" id="tipo" class="form-select form-select-lg bg-light">
                            <option value="simples" @selected($usuario->tipo == 'simples')>Simples</option>
                            <option value="admin" @selected($usuario->tipo == 'admin')>Admin</option>
                        </select>
                    </div>
                @endcan

                @can('acessar-usuarios')
                    <div class="mb-3 col-sm-6">
                        <label for="status" class="form-label fs-5 fs-5">Status do usuário</label>
                        <select name="status" id="status" class="form-select form-select-lg bg-light">
                            <option value="ativo" @selected($usuario->status == 'ativo')>Ativo</option>
                            <option value="inativo"@selected($usuario->status == 'inativo')>Inativo</option>
                        </select>
                    </div>
                @endcan

                <div class="mb-3">
                    <label for="foto" class="form-label fs-5 fs-5">Foto do usuário</label>

                    @if (auth()->user()->foto == null)
                        <img name="foto" src="/images/layout/user.png" class="img-thumbnail" height="110"
                            width="130">
                    @elseif ($usuario->foto == null)
                        <img name="foto" src="/images/layout/user.png" class="img-thumbnail" height="110"
                            width="130">
                    @else
                        <img name="foto" src="/storage/usuarios/{{ $usuario->foto }}" class="img-thumbnail"
                            height="110" width="130">
                    @endif

                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label fs-5">Escolher nova Foto</label>
                    <span class="text-muted">(Opcional)</span>
                    <input type="file" name="foto" class="form-control form-control-lg bg-light" value="">
                </div>

            </div>

            <div class="gap-2 d-md-block">
                <button type="submit" class="btn btn-primary m-1" name="alterar">Alterar</button>

                @if (auth()->user()->tipo == 'simples')
                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-danger m-1">Cancelar</a>
                @else
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-danger m-1">Cancelar</a>
                @endif
            </div>

        </form>
    </div>
@endsection
