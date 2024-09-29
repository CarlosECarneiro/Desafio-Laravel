<x-layout :title="'Visualizar'">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="card col-lg-9">
                <div class="row my-2">
                    <div class="col-md-4">
                        @if (isset($cliente->foto))
                            @php
                                $imagem = $cliente->foto
                            @endphp
                        @else
                            @php
                                $imagem = "default-avatar.jpg"
                            @endphp
                        @endif
                        <img src="{{url('/clientes',$imagem)}}" class="rounded" style="width:200px; height:200px">
                    </div>
                    <div class="col-md-8">
                        <p><strong>Nome: </strong>{{ $cliente->nome }}</p>
                        <p><strong>CPF/CNPJ: </strong>{{ $cliente->cpf_cnpj}}</p>
                        @if ($cliente->dt_nascimento)
                            <p><strong>Data de Nascimento: </strong>{{ date('d/m/Y', strtotime($cliente->dt_nascimento))}}</p>
                        @endif
                        @if ($cliente->nome_social)
                            <p><strong>Nome Social: </strong>{{ $cliente->nome_social}}</p>
                        @endif
                        <a href="{{url('/atualizar',$cliente->id)}}" class="btn btn-primary"> Editar </a>
                        <button class="btn btn-danger" onclick="excluir('{{$cliente->id}}')">Excluir</button>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>