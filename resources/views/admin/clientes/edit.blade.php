@extends('layouts.default')


@section('conteudo')
    <div class="container shadow bg-white pb-4 px-4 rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-4">Alterar Cliente</h2>

        <form method="POST" action="{{ route('admin.clientes.update', $cliente->id) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">
            <div class="row pt-3">
                <div class="mb-3 col-sm-4">
                    <label for="nome" class="form-label">Nome</label>
                    <span class="text-danger">(Obrigatório)</span>
                    <input type="text" name="nome" class="form-control form-control-lg bg-light"
                        value="{{ $cliente->nome }}" required>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="data_nasc" class="form-label">Data de Nascimento</label>
                    {{-- <span class="text-danger">(Obrigatório)</span> --}}
                    <input type="date" name="data_nasc" class="form-control form-control-lg bg-light"
                        value="{{ $cliente->data_nasc }}">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="sexo" class="form-label">Sexo</label>
                    <span class="text-danger">(Obrigatório)</span>
                    <select name="sexo" class="form-select form-select-lg bg-light" value="" required>
                        <option value="masculino" @selected($cliente->sexo == 'masculino')>Masculino</option>
                        <option value="feminino" @selected($cliente->sexo == 'feminino')>Feminino</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="email" class="form-label">E-mail</label>
                    {{-- <span class="text-muted">(Opcional)</span> --}}
                    <input type="email" name="email" class="form-control form-control-lg bg-light"
                        value="{{ $cliente->email }}">
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="telefone" class="form-label">Telefone</label>
                    <span class="text-danger">(Obrigatório)</span>
                    <input type="tel" name="telefone" placeholder="(DD) XXXXX-XXXX"
                        class="telefone form-control form-control-lg bg-light" value="{{ $cliente->telefone }}" required>
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="telefone_contato" class="form-label">Telefone para contato</label>
                    <input type="text" name="telefone_contato" placeholder="(DD) XXXXX-XXXX"
                        class="telefone form-control form-control-lg bg-light" value="{{ $cliente->telefone_contato }}">
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="estado" class="form-label">Estado</label>
                    {{-- <input type="text" name="estado" class="form-control form-control-lg bg-light" value=""
                        required> --}}
                    <select id="editestado" name="estado" class="form-select form-select-lg bg-light" value="">
                        <option value="" >Selecione um estado</option>
                        <option value="Acre" @selected($cliente->estado == 'Acre')>Acre</option>
                        <option value="Alagoas" @selected($cliente->estado == 'Alagoas')>Alagoas</option>
                        <option value="Amazonas" @selected($cliente->estado == 'Amazonas')>Amazonas</option>
                        <option value="Amapá" @selected($cliente->estado == 'Amapá')>Amapá</option>
                        <option value="Bahia" @selected($cliente->estado == 'Bahia')>Bahia</option>
                        <option value="Ceará" @selected($cliente->estado == 'Ceará')>Ceará</option>
                        <option value="Distrito Federal" @selected($cliente->estado == 'Distrito Federal')>Distrito Federal</option>
                        <option value="Espírito Santo" @selected($cliente->estado == 'Espírito Santo')>Espírito Santo</option>
                        <option value="Goiás" @selected($cliente->estado == 'Goiás')>Goiás</option>
                        <option value="Maranhão" @selected($cliente->estado == 'Maranhão')>Maranhão</option>
                        <option value="Minas Gerais" @selected($cliente->estado == 'Minas Gerais')>Minas Gerais</option>
                        <option value="Mato Grosso do Sul" @selected($cliente->estado == 'Mato Grosso do Sul')>Mato Grosso do Sul</option>
                        <option value="Mato Grosso" @selected($cliente->estado == 'Mato Grosso')>Mato Grosso</option>
                        <option value="Pará" @selected($cliente->estado == 'Pará')>Pará</option>
                        <option value="Paraíba" @selected($cliente->estado == 'Paraíba')>Paraíba</option>
                        <option value="Pernambuco" @selected($cliente->estado == 'Pernambuco')>Pernambuco</option>
                        <option value="Piauí" @selected($cliente->estado == 'Piauí')>Piauí</option>
                        <option value="Paraná" @selected($cliente->estado == 'Paraná')>Paraná</option>
                        <option value="Rio de Janeiro" @selected($cliente->estado == 'Rio de Janeiro')>Rio de Janeiro</option>
                        <option value="Rio Grande do Norte" @selected($cliente->estado == 'Rio Grande do Norte')>Rio Grande do Norte</option>
                        <option value="Rondônia" @selected($cliente->estado == 'Rondônia')>Rondônia</option>
                        <option value="Roraima" @selected($cliente->estado == 'Roraima')>Roraima</option>
                        <option value="Rio Grande do Sul" @selected($cliente->estado == 'Rio Grande do Sul')>Rio Grande do Sul</option>
                        <option value="Santa Catarina" @selected($cliente->estado == 'Santa Catarina')>Santa Catarina</option>
                        <option value="Sergipe" @selected($cliente->estado == 'Sergipe"')>Sergipe</option>
                        <option value="São Paulo" @selected($cliente->estado == 'São Paulo')>São Paulo</option>
                        <option value="Tocantins" @selected($cliente->estado == 'Tocantins')>Tocantins</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input id="editcidade" type="text" name="cidade" class="form-control form-control-lg bg-light"
                        value="{{ $cliente->cidade }}">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="cep" class="form-label">Cep</label>
                    <input type="text" name="cep" class="cep form-control form-control-lg bg-light"
                        value="{{ $cliente->cep }}">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" name="bairro" class="form-control form-control-lg bg-light"
                        value="{{ $cliente->bairro }}">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" name="logradouro" class="form-control form-control-lg bg-light"
                        value="{{ $cliente->logradouro }}">
                </div>

            </div>

            <div class="gap-2 d-md-block">
                <button type="submit" class="btn btn-primary m-1" name="alterar">Alterar</button>

                <a href="{{ route('admin.clientes.index') }}" class="btn btn-danger m-1">Cancelar</a>
            </div>

        </form>
    </div>
@endsection
