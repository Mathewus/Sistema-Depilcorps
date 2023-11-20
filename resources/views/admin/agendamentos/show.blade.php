@extends('layouts.default')


@section('conteudo')
    <div class="container shadow bg-white pb-4 px-4 rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-4">Dados do Agendamento</h2>

        <table class="table table-striped">
            {{-- <thead class="" style="background-color: #24262F; color: #FFF;">
            </thead> --}}
            <tbody>
                <tr>
                    <td><strong>Nome do Cliente:</strong> <span class="text-capitalize">{{ $agendamento->cliente->nome }}</span></td>
                </tr>
                <tr>
                    <td><strong>Status do Agendamento:</strong> <span class="text-capitalize">{{ $agendamento->status }}</span></td>
                </tr>
                <tr>
                    <td>
                        <strong>Data:</strong> @php echo date('d/m/Y', strtotime($agendamento->data))@endphp
                    </td>
                </tr>
                <tr>
                    <td><strong>Horário:</strong> {{ $agendamento->hora }}</td>
                </tr>
                <tr>
                    <td><strong>Serviços:</strong><br>
                    <ul>
                        @foreach ($agendamento->servicos as $servico)
                            <li class="text-capitalize">{{ $servico->descricao ." - R$ ". $servico->preco  }}</li>
                        @endforeach
                    </ul>
                </tr>
                <tr>
                    <td><strong>Valor total:</strong> R$ {{ $agendamento->valor_total }}</td>
                </tr>
                <tr>
                    <td><strong>Observação:</strong> {{ $agendamento->observacao }}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>

            </tbody>

        </table>


        <div class="gap-2 d-md-block">
            <a href="{{ route('admin.agendamentos.edit', $agendamento->id) }}" class="btn btn-primary m-1">Editar</a>

            <a href="{{ route('admin.agendamentos.index') }}" class="btn btn-danger m-1">Voltar</a>
        </div>

    </div>
@endsection
