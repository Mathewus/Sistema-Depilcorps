@extends('layouts.default')

@section('conteudo')
    <div class="container shadow bg-white pb-4 px-4 rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-4">Alterar Agendamento</h2>

        <div class="col-12">
            <h6 class="form-label">Cliente: <strong>{{ $agendamento->cliente->nome }}</strong></h6>
        </div>

        <form method="POST" action="{{ route('admin.agendamentos.update', $agendamento->id) }}"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">

            {{-- <input type="hidden" value="{{$cliente->id}}" name="id_cliente"> --}}

            <div class="row pt-3">
                <div class="mb-3 col-sm-4">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" name="data" class="form-control form-control-lg bg-light"
                        value="{{ $agendamento->data }}">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="time" name="hora" class="form-control form-control-lg bg-light"
                        value="{{ $agendamento->hora }}">
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="observacao" class="form-label">Status</label>
                    <select name="status" class="form-select form-select-lg bg-light" required>
                        <option value="agendado" @selected($agendamento->status == 'agendado')>Agendado</option>
                        <option value="finalizado" @selected($agendamento->status == 'finalizado')>Finalizado</option>
                        <option value="cancelado" @selected($agendamento->status == 'cancelado')>Cancelado</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-12">
                    <label for="observacao" class="form-label">Observação</label>
                    <span class="text-muted">(Opcional)</span>
                    <textarea name="observacao" class="form-control form-control-lg bg-light" value="{{ $agendamento->observacao }}">{{ $agendamento->observacao }}</textarea>
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
                                    <li class="text-capitalize"><input type="checkbox" name="servicos[]" value="{{ $servico->id }}"
                                        @checked(in_array($servico->id, $servicos_selecionados))> {{ $servico->descricao . " - R$ " . $servico->preco }}<br></li>
                                @endforeach
                            </ul>
                        </td>
                        </tr>
                    </tbody>
        
                </table>

                {{-- <div class="mb-3 col-12">
                    <label for="servicos" class="form-label">Serviços</label>
                    <div>
                        @foreach ($servicos as $servico)
                            <input type="checkbox" name="servicos[]" value="{{ $servico->id }}"
                                @checked(in_array($servico->id, $servicos_selecionados))> {{ $servico->descricao . " - R$ " . $servico->preco }}<br>
                        @endforeach
                    </div>
                </div> --}}

            </div>

            <div class="gap-2 d-md-block">
                <button type="submit" class="btn btn-primary m-1" name="alterar">Alterar</button>

                <a href="{{ route('admin.agendamentos.index') }}" class="btn btn-danger m-1">Cancelar</a>
            </div>

        </form>
    </div>
@endsection
