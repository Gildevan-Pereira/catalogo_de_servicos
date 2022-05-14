@extends('layouts.main')

@section('title', 'Logs')

@section('content')

    <nav class="navbar navbar-expand-md navbar-light mb-0">
        <div class="container">

            <a class="navbar-brand text-info fs-5" href="/perfil">Perfil</a>

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
                        @if(Auth::user()->tipo == "Super Usuário")
                            <li class="nav-item">
                                <a class="nav-link active text-info fs-5" aria-current="page" href="/cadastro">Novo Usuário
                                    <span class="ms-3 border border-info"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-info fs-5" aria-current="page" href="/dashboard">Dashboard
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
  
    <main class="form- container text-center mt-0 pt-0 mb-5">

        <nav class="nav justify-content-center  fs-3">
            <strong><p class="text-info">Logs do Sistema</p></strong>
        </nav>
        
        <ul class="list-group list-group-flush">
            @foreach($logs as $show_logs)

            <?php
                $categoria = $show_logs->categoria;
            ?>
    
                @if($show_logs->action === "Adicionou")
                    <li class="list-group-item">{{$show_logs->user}} 
                        - <a class="text-secondary text-decoration-none">{{$show_logs->action}}</a>
                        - <a class="text-primary text-decoration-none">{{$show_logs->nome_servico}}</a> em 
                        <a class="@if($categoria == 'Acadêmico') text-success @elseif($categoria == 'Administrativo') text-danger @elseif($categoria == 'Geral') text-info @elseif($categoria == 'Serviços RNP') text-warning @elseif($categoria == 'Serviços Obsoletos') text-gray  @endif text-decoration-none">
                            {{$show_logs->categoria}}
                        </a> 
                        em <a class="text-primary text-decoration-none">{{$show_logs->created_at}}</a>
                    </li>
                @elseif($show_logs->action === "Editou")
                    <li class="list-group-item">{{$show_logs->user}}
                         - <a class="text-warning text-decoration-none">{{$show_logs->action}}</a> 
                         - <a class="text-primary text-decoration-none">{{$show_logs->nome_servico}}</a> 
                         em <a class="@if($categoria == 'Acadêmico') text-success @elseif($categoria == 'Administrativo') text-danger @elseif($categoria == 'Geral') text-info @elseif($categoria == 'Serviços RNP') text-warning @elseif($categoria == 'Serviços Obsoletos') text-gray  @endif text-decoration-none">
                             {{$show_logs->categoria}}
                            </a> 
                         em <a class="text-primary text-decoration-none">{{$show_logs->created_at}}</a>
                    </li>
                @else
                    <li class="list-group-item">{{$show_logs->user}}
                         - <a class="text-danger text-decoration-none">{{$show_logs->action}}</a>
                         - <a class="text-primary text-decoration-none">{{$show_logs->nome_servico}}</a> 
                         em <a class="@if($categoria == 'Acadêmico') text-success @elseif($categoria == 'Administrativo') text-danger @elseif($categoria == 'Geral') text-info @elseif($categoria == 'Serviços RNP') text-warning @elseif($categoria == 'Serviços Obsoletos') text-gray  @endif text-decoration-none">
                             {{$show_logs->categoria}}
                            </a> 
                         em <a class="text-primary text-decoration-none">{{$show_logs->created_at}}</a>
                    </li>
                @endif

            @endforeach
        
            </ul>
    </main>

    <div class="container col-lg-5 col-ms-12 text-center mt-5">
        <p class="texto-aviso-de-tempo-de-log text-success">O histórico de ações de adicionar, editar e excluir de todos os usuários será exibido aqui.</p>
    </div>

@endsection