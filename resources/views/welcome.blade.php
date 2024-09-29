<x-layout>

    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-lg-9">
                <form action="/pesquisar" method="get" class="form-inline my-2">
                    <div class="input-group">
                        <input type="text" name="pesquisa" placeholder="Pesquisar" class="form-control">
                        <div class="input-group-text">
                            <input type="radio" name="opcao" id="nome" value="nome" class="form-check-input" checked>
                            <label for="nome">Nome</label>  
                        </div>
                        <div class="input-group-text">
                            <input type="radio" name="opcao" id="cpf_cnpj" value="cpf_cnpj" class="form-check-input">
                            <label for="cpf_cnpj">CPF/CNPJ</label>
                        </div>
                        <button type="submit" class="btn btn-secondary">OK</button>
                    </div>
                </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Perfil</th>
                            <th>Nome</th>
                            <th>CPF/CNPJ</th>
                            <th class="d-none d-md-table-cell">Ação</th>
                        </tr>
                    </thead>
                    @if($clientes->isNotEmpty())
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>
                                    @if (isset($cliente->foto))
                                        @php
                                            $imagem = $cliente->foto
                                        @endphp
                                    @else
                                        @php
                                            $imagem = "default-avatar.jpg"
                                        @endphp
                                    @endif
                                    <img src="{{url('/clientes/mini',$imagem)}}" class="rounded-circle" style="width:50px; height:50px">
                                    <br><a href="{{url('/visualizar-cliente',$cliente->id)}}" class="btn btn-primary d-block d-md-none mt-2">Ver</a>
                                </td>
                                <td style="max-width:150px; overflow:hidden; text-overflow: ellipsis">{{$cliente->nome}}</td>
                                <td>{{$cliente->cpf_cnpj}}</td>
                                <td class="d-none d-md-table-cell">
                                    <a href="{{url('/visualizar-cliente',$cliente->id)}}" class="btn btn-primary">Ver</a>
                                </td>
                            </tr>  
                        @endforeach
                        {{$clientes->links()}}
                    </tbody>
                    @else
                        <div class="alert alert-danger">
                            <strong>Nenhum resultado encontrado.</strong>
                        </div>
                    @endif
                </table>
            </div>
        </div>
    </div>
</x-layout>