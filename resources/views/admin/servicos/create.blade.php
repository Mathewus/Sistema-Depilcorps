@extends('layouts.default')

@section('conteudo')

    <div class="container shadow bg-white pb-4 px-4 rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-4">Cadastrar Serviço</h2>

        <form method="POST" action="{{ route('admin.servicos.store') }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" value="1" name="id_user">
            <div class="row pt-3">
                <div class="mb-3 col-sm-4">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control form-control-lg bg-light" value="" required>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" name="preco" placeholder="R$" class="form-control form-control-lg bg-light" value=""
                        required>
                </div>

            </div>

            <div class="gap-2 d-md-block">
                    <button type="submit" class="btn btn-primary m-1" name="cadastrar">Cadastrar</button>
                    
                    <a href="{{ route('admin.servicos.index') }}" class="btn btn-danger m-1">Cancelar</a>
            </div>

        </form>
    </div>
@endsection
