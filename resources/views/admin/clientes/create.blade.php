@extends('layouts.default')

@section('conteudo')
    <div class="container shadow bg-white pb-4 px-4 rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-4">Cadastrar Cliente</h2>

        <form method="POST" action="{{ route('admin.clientes.store') }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">

            <div class="row pt-3">
                <div class="mb-3 col-sm-4">
                    <label for="nome" class="form-label">Nome</label> 
                    <span class="text-danger">(Obrigatório)</span>
                    <input type="text" name="nome" class="form-control form-control-lg bg-light" value=""
                        required>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="data_nasc" class="form-label">Data de Nascimento</label>
                    {{-- <span class="text-danger">(Obrigatório)</span> --}}
                    <input type="date" name="data_nasc" class="form-control form-control-lg bg-light" value="">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="sexo" class="form-label">Sexo</label>
                    <span class="text-danger">(Obrigatório)</span>
                    <select name="sexo" class="form-select form-select-lg bg-light" value="" required>
                        <option value="">--</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="email" class="form-label">E-mail</label>
                    {{-- <span class="text-muted">(Opcional)</span> --}}
                    <input type="email" name="email" class="form-control form-control-lg bg-light" value="">
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="telefone" class="form-label">Telefone</label>
                    <span class="text-danger">(Obrigatório)</span>
                    <input type="tel" name="telefone" placeholder="(DD) XXXXX-XXXX"
                        class="telefone form-control form-control-lg bg-light" value="" required>
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="telefone_contato" class="form-label">Telefone para contato</label>
                    <input type="tel" name="telefone_contato" placeholder="(DD) XXXXX-XXXX"
                        class="telefone form-control form-control-lg bg-light" value="">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="estado" class="form-label">Estado</label>
                    {{-- <input type="text" name="estado" class="form-control form-control-lg bg-light" value=""
                        required> --}}
                        <select id="estados" name="estado" class="form-select form-select-lg bg-light" value=""  title="selecione um estado antes de escolher a cidade">
                            <option value=""></option>
                        </select>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    {{-- <input type="text" name="cidade" class="form-control form-control-lg bg-light" value=""
                        required> --}}
                        <select id="cidades" name="cidade" class="form-select form-select-lg bg-light" value="">
                        </select>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="cep" class="form-label">Cep</label>
                    <input type="text" name="cep" placeholder="00000-000" class="cep form-control form-control-lg bg-light" value="">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" name="bairro" class="form-control form-control-lg bg-light" value="">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" name="logradouro" class="form-control form-control-lg bg-light" value="">
                </div>
                
            </div>

            <div class="gap-2 d-md-block">
                <button type="submit" class="btn btn-primary m-1" name="cadastrar">Cadastrar</button>

                <a href="{{ route('admin.clientes.index') }}" class="btn btn-danger m-1">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
