@extends('layouts.menu')

@section('menutab')

    @if
        <nav>
            <div class="nav nav-tabs justify-content-center row" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active col-6 text-center bg-secondary text-secondary fs-4" id="nav-home-tab" data-toggle="tab" href="/cadastro-de-servicos" role="tab" aria-controls="nav-home" aria-selected="true">Cadastro de Serviços</a>
            <a class="nav-item nav-link col-6 text-center bg-dark text-light fs-4" data-toggle="tab" href="/todas-as-categorias" role="tab" aria-controls="nav-profile" aria-selected="false">Menu de Serviços</a>
            </div>
        </nav>

        <nav>
            <div class="nav nav-tabs justify-content-center row" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active col-6 text-center bg-dark text-light fs-4" id="nav-home-tab" data-toggle="tab" href="/cadastro-de-servicos" role="tab" aria-controls="nav-home" aria-selected="true">Cadastro de Serviços</a>
            <a class="nav-item nav-link col-6 text-center bg-secondary text-secondary fs-4" data-toggle="tab" href="/todas-as-categorias" role="tab" aria-controls="nav-profile" aria-selected="false">Menu de Serviços</a>
            </div>
        </nav>

@endsection
