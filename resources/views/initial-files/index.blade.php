@extends('layouts.main')

@section('title', 'Login')

@section('content')

    <!-- Main com o formulário de login e menú de abas -->
    <main class="form-signin mt-0 pt-0">
        <!-- Menu de abas -->
        <nav class="nav justify-content-center mb-5 mt-3 fs-4">
            <span class="border-bottom borda-verde-claro pt-0">
                <strong><a href="/" class="nav-link active text-info pb-0">LOGIN</a></strong>
            </span>
            {{-- <span class="text-info border border-info"></span>
                <strong><a class="nav-link text-info" href="/codigo">CADASTRO</a></strong> --}}
        </nav>

        <!-- Formulário de Login -->
        
        <form action="/login2" method="POST" class="">
            @csrf
            <div class="form">
                <strong><label class="form-label text-success" for="floatingInput">E-mail</label></strong>
                <input type="email" name="email" value="" class="form-control rounded-pill border-info" required autofocus id="floatingInput" placeholder="name@example.com">
            </div>
            <div class="form">
                <strong><label class="form-label text-success mt-2" for="floatingPassword">Senha</label></strong>
                <input type="password" name="password" class="form-control rounded-pill border-info" id="floatingPassword" required autofocus placeholder="********">
            </div>
        
            <div class="mb-3">
                <label>
                    <a href="/recuperacao-de-senha" class="text-decoration-none">Esqueci minha senha</a>
                </label>
            </div>
            <div class="text-center">

                <input  class="col-4 btn btn-lg btn-success rounded-pill text-decoration-none text-light"  value="Entrar" type="submit"></input>
              
            </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Catálogo de Serviços de TI IF Sertão - PE</p>
        </form>
    </main>

@endsection
