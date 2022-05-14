@extends('layouts.main')

@section('title', 'Recuperação de Senha')

@section('content')

        {{-- <div class="container pb-0">
            <a href="/" class="text-secondary">
                <i class="bi bi-arrow-left-circle-fill display-6 ml-5 botão-voltar"></i>
            </a>
        </div> --}}
        <main class="form-signin mt-0 pt-0">
            
            <nav class="nav justify-content-center  fs-3">
            <strong><p class="text-info">Recuperação de Senha</p></strong>
            </nav>

            <form class="" action="/recuperacao-de-senha" method="post">    <!--formulário de login -->
                @csrf
                <div class="form">
                    <strong><label class="form-label text-success mb-0 mt-1" for="floatingInput1">E-mail de Usuário</label></strong>
                    <input type="email" name="email" class="form-control rounded-pill border-info" id="floatingInput1" placeholder="name@example.com"/>
                </div>
                <div class="form">
                    <strong><label class="form-label text-success mb-0 mt-1" for="floatingInput2">Nova Senha</label></strong>
                    <input type="password" name="senha" minlength="8" maxlength="25" class="form-control rounded-pill border-info" id="floatingInput2" placeholder="********"/>
                </div>
                <div class="form">
                    <strong><label class="form-label text-success mb-0 mt-1" for="floatingInput3">Confirmação de Senha</label></strong>
                    <input type="password" name="password_confirmation" minlength="8" maxlength="25" class="form-control rounded-pill border-info" id="floatingInput3" placeholder="********"/>
                </div>
                <div class="form">
                    <input type="hidden" name="token" value="{{$token}}" class="form-control rounded-pill border-info"/>
                </div>
                <div class="text-center mt-5">
                    <button class="col-4 btn btn-lg btn-success rounded-pill" type="submit">Enviar</button>
                </div>
                <strong>
                    <p class="mt-5 mb-3 text-muted text-center text-success">Sua senha será redefinida</p>
                </strong>
            </form>
        </main>

@endsection