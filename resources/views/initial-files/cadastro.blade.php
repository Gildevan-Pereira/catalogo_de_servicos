@extends('layouts.main')

@section('title', 'Cadastro')

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
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link active text-info fs-5" aria-current="page" href="/logs">Logs
                                    <span class="ms-3 border border-info"></span>
                                </a>
                            </li>
                            @if(Auth::user()->tipo == "Super Usuário")
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
            <strong><p class="text-info">Cadastro de Usuário</p></strong>
        </nav>
        {{-- <nav class="nav justify-content-center mb-4 mt-3 fs-5">
             <strong><a class="nav-link active text-info" href="/">LOGIN</a></strong>
            <span class="text-info border border-info"></span>
            <span class="border-bottom borda-verde-claro pt-0">
                <strong><a class="nav-link text-info pb-0" href="/cadastro">CADASTRO</a></strong>
            </span>
        </nav> --}}

        <form action="/criar_cadastro" method="post" class="">    <!--formulário de login -->
            @csrf
            <div class="text-center mb-2">
                <div class="mb-2">
                    <label for="" class="text-success"><strong>Tipo de Usuário:</strong></label>
                </div>
                <div class="form-check form-check-inline text-gray">
                    <input class="form-check-input" type="radio" name="tipo_usuario" id="inlineRadio1" value="Padrão" required>
                    <label class="form-check-label" for="inlineRadio1">Usuário Padrão</label>
                </div>
                <div class="form-check form-check-inline text-gray">
                    <input class="form-check-input" type="radio" name="tipo_usuario" id="inlineRadio2" value="Super Usuário" required>
                    <label class="form-check-label" for="inlineRadio2">Super Usuário</label>
                </div>
            </div>
            <div class="form">
                <strong><label class="form-label text-success" for="floatingInput1">Nome</label></strong>
                <input type="text" name="nome" value="@if(session('error')){{old('nome')}}@endif" class="form-control rounded-pill border-info" id="floatingInput1" placeholder="Ex: Francisco Hamilton" required>
            </div>
            <div class="form">
                <strong><label class="form-label text-success mt-1" for="floatingInput2">E-mail</label></strong>
                <input type="email" name="email" value="@if(session('error')){{old('email')}}@endif" class="form-control rounded-pill border-info" id="floatingInput2" placeholder="name@example.com" requidec>
            </div>
            <div class="form">
                <strong><label class="form-label text-success mt-1" for="floatingPassword">Senha</label></strong>
                <input type="password" name="senha" value="@if(session('error')){{old('senha')}}@endif" minlength="8" maxlength="25" class="form-control rounded-pill border-info" id="floatingPassword" placeholder="********" required>
            </div>
            <div class="form">
                <strong><label class="form-label text-success" for="floatingPassword2">Confirmação de Senha</label></strong>
                <input type="password" name="confirma_senha" value="@if(session('error')){{old('confirma_senha')}}@endif" minlength="8" maxlength="25" class="form-control rounded-pill border-info" id="floatingPassword2" placeholder="********" required>
            </div>
            <div class="text-center mt-4 mb-3">
                <input class="btn btn-lg btn-success rounded-pill" type="submit" value="Cadastrar"></input>
            </div>
            
        </form>
    </main>

    {{-- <script>
        document.querySelector("form").addEventListener("submit", (e)=>{
            if(!document.querySelector("input[name='tipo_usuario']").checked){
                alert("Você deve escolher um tipo de usuário!");
                e.preventDefault();
            }
        });
    </script> --}}

@endsection