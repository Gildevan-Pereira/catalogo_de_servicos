@extends('layouts.main')

@section('title', 'Perfil')

@section('content')

    <nav class="navbar navbar-expand-md navbar-light mb-0">
        <div class="container">

            <a class="navbar-brand text-info fs-5 active" href="/logs">Logs</a>

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
  
    <main class="form-signin mt-0 pt-0">

        <nav class="nav justify-content-center  fs-3">
            <strong><p class="text-info">Perfil de Usuário</p></strong>
        </nav>


            <form action="/update/{{ Auth::user()->id }}" method="get" class="">    <!--formulário de login -->
                @csrf
                {{-- @foreach($dados as $data) --}}
                {{-- {{$data->name_usuario}}
                {{$data->email_usuario}} --}}
                <div class="form">
                    <strong><label class="form-label text-success" for="floatingInput1">Nome</label></strong>
                    <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control rounded-pill text-success border-info" id="floatingInput1" placeholder="Ex: Francisco Hamilton">
                </div>
                
                <div class="form">
                    <strong><label class="form-label text-success mt-1" for="floatingInput2">E-mail</label></strong>
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control rounded-pill border-info text-success" id="floatingInput2" placeholder="name@example.com">
                </div>
                {{-- @endforeach --}}
                <div class="form">
                    <strong><label class="form-label text-success mt-1" for="floatingPassword1">Senha</label></strong>
                    <div class="input-group mb-2">
                        <input type="password" name="password" minlength="8" maxlength="25" value="" class="form-control border-info text-success" id="floatingPassword1" placeholder="********">
                        <div class="input-group-prepend">
                          <div class="input-group-text border-info" id="olho"><i id="show_password" class="bi bi-eye-fill"></i></div>
                        </div>
                    </div>
                </div>

                <script>
                    
                    var senha = $('#floatingPassword1');
                    var olho= $("#olho");


                    olho.mousedown(function() {
                    senha.attr("type", "text");
                    $('#floatingPassword1').css({marginBottom:"10px", borderTopLeftRadius: "20px", borderBottomLeftRadius: "20px", borderRight: "none" });
                    $('#show_password').attr('class', 'bi bi-eye-slash-fill');
                    });

                    olho.mouseup(function() {
                    senha.attr("type", "password");
                    $('#show_password').attr('class', 'bi bi-eye-fill');
                    });
                    // para evitar o problema de arrastar a imagem e a senha continuar exposta, 
                    //citada pelo nosso amigo nos comentários
                    $( "#olho" ).mouseout(function() { 
                    $("#floatingPassword1").attr("type", "password");
                    $('#show_password').attr('class', 'bi bi-eye-fill');
                    });
                </script>

                <div class="text-center mt-4 mb-3">
                    <button class="btn btn-lg btn-success rounded-pill" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm" type="submit" value="Atualizar">Atualizar</button>
                
                    <!-- <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            ...
                        </div>
                        </div>
                    </div> --> 
                </div>

            
                
            </form>

           
                                
    </main>

@endsection