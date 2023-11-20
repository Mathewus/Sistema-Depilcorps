@extends('layouts.default')

@section('conteudo')
    <div class="container shadow bg-white pb-4 px-4 rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-5">Cadastrar Usuario</h2>

        <form method="POST" action="{{ route('admin.usuarios.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label for="nome" class="form-label fs-5 fs-5">Nome</label>
                    <input type="text" class="form-control form-control-lg bg-light" id="name" name="nome"
                        required>
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="email" class="form-label fs-5 fs-5">E-mail</label>
                    <input type="text" class="form-control form-control-lg bg-light" id="email" name="email"
                        required>
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="password" class="form-label fs-5 fs-5">Senha</label>
                    <div class="d-flex justify-content-end align-items-center">
                        <input type="password" class="password form-control form-control-lg bg-light" name="password"
                            required>
                        <div class="icon">
                            <img class="icon-image" onclick="showhide()" src="/images/layout/show.png" width="30px"
                                height="30px" alt="">
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="tipo" class="form-label fs-5 fs-5">Tipo do usuário</label>
                    <select name="tipo" id="tipo" class="form-select form-select-lg bg-light" required>
                        <option value="">--</option>
                        <option value="simples">simples</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="status" class="form-label fs-5 fs-5">Status do usuário</label>
                    <select name="status" id="status" class="form-select form-select-lg bg-light" required>
                        <option value="">--</option>
                        <option value="ativo">ativo</option>
                        <option value="inativo">inativo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label fs-5">Foto</label>
                    <span class="text-muted">(Opcional)</span>
                    <input type="file" name="foto" class="form-control form-control-lg bg-light" value="">
                </div>

                <div class="gap-2 d-md-block">
                    <button type="submit" class="btn btn-primary m-1">Cadastrar</button>

                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-danger m-1"> Cancelar</a>
                </div>
            </div>
        </form>

    </div>
@endsection
