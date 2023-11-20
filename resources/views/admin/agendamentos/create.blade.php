@extends('layouts.default')

@section('conteudo')
    <div class="container shadow bg-white pb-4 px-4 rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-4">Agendar Cliente</h2>

        <div class="col-12">
            <h6 class="form-label text-capitalize">Nome: <strong class="">{{ $cliente->nome }}</strong></h6>
        </div>

        <form method="POST" action="{{ route('admin.agendamentos.store')}}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">

            <input type="hidden" value="{{ $cliente->id }}" name="id_cliente">

            <div class="row pt-3">
                <div class="mb-3 col-6">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" name="data" class="form-control form-control-lg bg-light" value=""
                        required>
                </div>
                <div class="mb-3 col-6">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="time" name="hora" class="form-control form-control-lg bg-light" value=""
                        required>
                </div>
                <div class="mb-3 col-12">
                    <label for="observacao" class="form-label">Observação</label>
                    <span class="text-muted">(Opcional)</span>
                    <textarea type="text" name="observacao" class="form-control form-control-lg bg-light" value=""></textarea>
                </div>

                <table class="table table-striped">

                    <tbody>
                        <tr>
                            <td class="mb-2"><strong>Serviços:</strong><br></td>

                        </tr>
                        <tr>
                            <td>
                            <ul style="list-style: none;">
                                @foreach ($servicos as $servico)
                                    <li class="text-capitalize"><input type="checkbox" name="servicos[]" value="{{ $servico->id }}">
                                        {{ $servico->descricao ." - R$ ". $servico->preco }}<br></li>
                                @endforeach
                            </ul>
                        </td>
                        </tr>
                    </tbody>
        
                </table>

                {{-- <div class="mb-3 col-12">
                    <label for="servicos" class="form-label">Serviços</label>
                    <div>
                        @if ($servicos->count() == 0)

                            <h6>Não possui serviços cadastrados!</h6>

                        @else
                            @foreach ($servicos as $servico)
                                <input type="checkbox" name="servicos[]" value="{{ $servico->id }}">
                                {{ $servico->descricao ." - R$ ". $servico->preco }}<br>
                        @endforeach
                        @endif
                    </div>
                </div> --}}

            </div>

            <div class="gap-2 d-md-block">
                <button type="submit" class="btn btn-primary m-1" name="cadastrar">Cadastrar</button>

                <a href="{{ route('admin.clientes.index') }}" class="btn btn-danger m-1">Cancelar</a>
            </div>

        </form>
    </div>
@endsection
