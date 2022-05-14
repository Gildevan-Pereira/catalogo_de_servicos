@extends('layouts.main')

@section('title', 'Recuperação de Senha')

@section('content')

        <div class="container pb-0">
            <a href="/" class="text-secondary">
                <i class="bi bi-arrow-left-circle-fill display-6 ml-5 botão-voltar"></i>
            </a>
        </div>
        <main class="form-signin mt-0 pt-0">
            
            <nav class="nav justify-content-center  fs-3">
            <strong><p class="text-info">Recuperação de Senha</p></strong>
            </nav>

            <form class="" action="/recuperacao-pass" method="post">    <!--formulário de login -->
                @csrf
                <div class="form">
                    <strong><label class="form-label text-success" for="floatingInput">E-mail de Usuário</label></strong>
                    <input type="email" name="email" class="form-control rounded-pill border-info" id="floatingInput" placeholder="name@example.com">
                </div>
               
                <div class="text-center mt-5">
                    <button class="col-4 btn btn-lg btn-success rounded-pill" type="submit">Enviar</button>
                </div>
                <strong>
                    <p class="mt-5 mb-3 text-muted text-center text-success">Será enviado um link de redefinição de senha para seu email</p>
                </strong>
            </form>
        </main>

@endsection