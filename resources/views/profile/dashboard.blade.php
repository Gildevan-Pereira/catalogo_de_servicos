@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <nav class="navbar navbar-expand-md navbar-light mb-0">
        <div class="container">

            <a class="navbar-brand text-info fs-5 active" href="/perfil">Perfil</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" hidden aria-current="page" href="#"></a>
                </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active text-info fs-5" aria-current="page" href="/logs">Logs
                                <span class="ms-3 border border-info"></span>
                            </a>
                        </li>
                        @if(Auth::user()->tipo == "Super Usuário")
                            <li class="nav-item">
                                <a class="nav-link active text-info fs-5" aria-current="page" href="/cadastro">Novo Usuário
                                    <span class="ms-3 border border-info"></span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link active text-info fs-5" aria-current="page" href="/todas-as-categorias">Painel Administrativo
                                <span class="ms-3 border border-info"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            
                                <a class="nav-link active text-info fs-5" aria-current="page" href="/logout">Sair</a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
  
    <main class="container mt-0 pt-0 justify-content-center mb-5">

        <nav class="nav justify-content-center  fs-3">
            <strong><p class="text-info">Dashboard</p></strong>
        </nav>

        
        <table class="table table-light table-hover">
            <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                        
                    </thead>
                    <tbody>
                        @foreach($usuarios as $user)
                            <tr class="table-active">
                                <th scope="row" class="table-active">{{$user->id}}</th>
                                <td class="table-active">{{$user->name}}</td>
                                <td class="table-active">{{$user->email}}</td>
                                <td class="table-active">{{$user->tipo}}</td>
                                <td class="table-active">
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary bi bi-pencil-square m-1" data-bs-toggle="modal" data-bs-target="#edit_user{{ $user->id }}">
                                        <button type="button" class="btn btn-danger bi bi-trash m-1" data-bs-toggle="modal" data-bs-target="#delete_user{{ $user->id }}">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

           
                 <!-- Modal -->
                 @foreach($usuarios as $user)
                 <div class="modal fade" id="edit_user{{ $user->id }}" tabindex="-1" aria-labelledby="tituloEdit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tituloEdit">Edite Este Usuário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/edit_user/{{ $user->id }}" method="get" class=""> 
                                @csrf
                                <div class="modal-body">
                                    <div class="mt-2">
                                        <input type="text" name="name" class="form-control border-info rounded-3" value="{{$user->name}}" placeholder="Nome" required>
                                    </div>
                                    <div class="mt-2">
                                        <input type="email" name="email" class="form-control border-info rounded-3" value="{{$user->email}}" placeholder="Email" required>
                                    </div>
                                    <div class="mt-2">
                                        <select name="tipo" id="tipo" value="" class="form-select form-control border-info rounded-3" required>
                                            @if(isset($user))
                                                <option @if($user->tipo == 'Padrão') selected @endif value="Padrão">Padrão</option>
                                                <option @if($user->tipo == 'Super Usuário') selected @endif value="Super Usuário">Super Usuário</option>
                                            @else
                                                <option selected value="Padrão">Padrão</option>
                                                <option value="Super Usuário" selected>Super Usuário</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Fechar"></input>
                                    <input type="submit" class="btn btn-success" value="Salvar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Modal delete -->
                @foreach($usuarios as $user)
                <div class="modal fade" id="delete_user{{ $user->id }}" tabindex="-1" aria-labelledby="tituloDelet" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="/delete_user/{{ $user->id }}" method="post" class="">    <!--formulário de login -->
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tituloDelet">Atenção!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p class="lead text-gray fs-4">
                                    Tem certeza que deseja excluir este usuário? A ação não poderá ser desfeita!
                                </p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-success" data-bs-dismiss="modal" value="Fechar"></input>
                                    <input type="submit" class="btn btn-danger" value="Deletar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach

    </main>

       

@endsection