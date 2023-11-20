@extends('layouts.default')


@section('conteudo')
    <div class="container shadow bg-white pb-4 px-4 rounded-4" style="max-width:100%; margin-top:-35px;">

        <h2 class="pt-3 mb-4">Dados do Cliente</h2>

        <table class="table table-striped">
            {{-- <thead class="" style="background-color: #24262F; color: #FFF;">
            </thead> --}}
            <tbody>
                <tr>
                    <td><strong>Nome:</strong> <span class="text-capitalize">{{ $cliente->nome }}</span></td>
                </tr>
                <tr>
                    <td><strong>Sexo:</strong> <span class="text-capitalize">{{ $cliente->sexo }}</span></td>
                </tr>
                <tr>
                    <td>
                        @if ($cliente->data_nasc == NULL)
                        <strong>Data de Nascimento:</strong>{{$cliente->data_nasc}}
                        @else
                        <strong>Data de Nascimento:</strong> @php echo date('d/m/Y', strtotime($cliente->data_nasc))@endphp
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><strong>Email:</strong> {{ $cliente->email }}</td>
                </tr>
                <tr>
                    <td><strong>Telefone:</strong> {{ $cliente->telefone }}</td>
                </tr>
                <tr>
                    <td><strong>Telefone para contato:</strong> {{ $cliente->telefone_contato }}</td>
                </tr>
                <tr>
                    <td><strong>Cidade:</strong> <span class="text-capitalize">{{ $cliente->cidade }}</span></td>
                </tr>
                <tr>
                    <td><strong>Estado:</strong> <span class="text-capitalize">{{ $cliente->estado }}</span></td>
                </tr>
                <tr>
                    <td><strong>Logradouro:</strong> <span class="text-capitalize">{{ $cliente->logradouro }}</span></td>
                </tr>
                <tr>
                    <td><strong>Bairro:</strong> <span class="text-capitalize">{{ $cliente->bairro }}</span></td>
                </tr>
                <tr>
                    <td><strong>CEP:</strong> {{ $cliente->cep }}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>

            </tbody>

        </table>


        <div class="gap-2 d-md-block">
            <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-primary m-1">Editar</a>

            <a href="{{ route('admin.clientes.index') }}" class="btn btn-danger m-1">Voltar</a>
        </div>

    </div>
@endsection
