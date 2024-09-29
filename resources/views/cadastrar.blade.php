<x-form :title="'Cadastro'">

    <form action="/cadastrar-cliente" method="post" enctype="multipart/form-data" id="clienteForm">
        @csrf
        <div class="container-lg">
            <div class="row justify-content-center my-5">
                <div class="col-lg-6 row">
                    <div class="card mt-3 p-3">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" placeholder="Digite o nome" name="nome" id="nome" class="form-control" value="{{old('nome')}}">
                            @if ($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="cpf_cnpj">CPF ou CNPJ:</label>
                            <input type="text" placeholder="Digite o CPF ou CNPJ" name="cpf_cnpj" id="cpf_cnpj" class="form-control" value="{{old('cpf_cnpj')}}">
                            @if ($errors->has('cpf_cnpj'))
                                <span class="text-danger">{{$errors->first('cpf_cnpj')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="dt_nascimento">Data de Nascimento:</label>
                            <input type="date" name="dt_nascimento" class="form-control" value="{{old('dt_nascimento')}}">
                            @if ($errors->has('dt_nascimento'))
                                <span class="text-danger">{{$errors->first('dt_nascimento')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nome_social">Nome Social:</label>
                            <input type="text" placeholder="Digite o nome social" name="nome_social" class="form-control" value="{{old('nome_social')}}">
                            @if ($errors->has('nome_social'))
                                <span class="text-danger">{{$errors->first('nome_social')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="foto">Foto:</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            @if ($errors->has('foto'))
                                <span class="text-danger">{{$errors->first('foto')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-form>