@extends('students.layout')

@section('content')
<head>
<style type="text/css">
.corpo {
background-color: #fff;
}
.card{
background-color: #fff;
}
.navbar{
background-color: #fff;
}
.text-center{
margin-bottom: 20px;
}
body{
background: fff;
}

</style>
</head>
    <div class="corpo">
    <div class="row">
        <div class="col-lg-12">
            <div class="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">ÍNICIO <span class="sr-only">(página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create">ESTÁGIO</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-1" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>

            </div>
            <h2 class="text-center">Lista de Estagiáos</h2>
        </div>
    </div>
    
</div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($students) > 0)
        <table class="table table-bordered">
            <tr>
                <th>Código</th>
                <th>Faculdade</th>
                <th>Estágio</th>
                <th>Curso</th>
                <th width="280px">Opções</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->detail }}</td>
                    <td>{{ $student->curso}}</td>
                    <td>
                        <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Visualizar</a>
                            <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Editar</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                        
                    </td>
                    
                </tr>
                
            @endforeach
        </table>
        <div class="btn1">
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('students.create') }}"> Cadastrar</a>
        </div>
        </div>
    @else
        <div class estagiário.</div>
        </div>

    @endif

    {!! $students->links() !!}

@endsection
