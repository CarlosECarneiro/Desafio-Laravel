<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-JIIO9i6Z4v4+G43Pl8sZlGnDSxb1A3wuHP9eDt2fGCMN9RycR3nU7z1JQEmX43Dg1k3twh7pmcY6yRLJ0R08uA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <script type="text/javascript">
        function excluir(id){
            if(confirm("Tem certeza de que deseja deletar?")){
                location.href="/excluir-cliente/"+id;
            }
        }

    </script>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="{{url('/')}}" class="btn btn-light"> Home </a>
            
                <a href="{{url('/cadastrar')}}" class="btn btn-primary"> Cadastrar </a>
        </div>
    </nav>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{$message}}</strong>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <strong>{{$message}}</strong>
        </div>
    @endif
    <div>{{ $slot }}</div>
</body>
</html>