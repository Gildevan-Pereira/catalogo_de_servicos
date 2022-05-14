@extends('layouts.main')

@section('title', 'Cadastro de Serviços')

@section('content')

<?php $title = "cadastro-de-servicos-etapa2"; ?>

    <div class="container mb-5">
        <div class="row">

            <ul class="nav flex-column col-sm-12 col-md-4 col-lg-4">
              
                @include('layouts.categorias')
                
            </ul>
            
            <div class="col-sm-12 col-md-8 col-lg-8 border" data-bs-spy="scroll" data-bs-target="#navbar-scrollspay" data-bs-offset="0" tabindex="0">
               
                <div class="scrollspay" id="navbar-scrollspay">

                    <nav>
                        <div class="nav nav-tabs justify-content-center row" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active col-6 text-center bg-secondary text-secondary fs-4" id="nav-home-tab" data-toggle="tab" href="/cadastro-de-servicos" role="tab" aria-controls="nav-home" aria-selected="true">Cadastro de Serviços</a>
                          <a class="nav-item nav-link col-6 text-center bg-dark text-light fs-4" data-toggle="tab" href="/todas-as-categorias" role="tab" aria-controls="nav-profile" aria-selected="false">Menu de Serviços</a>
                        </div>
                    </nav>
                      
                   
                    {{--  --}}
                    </div>
                        <div class="text-center mt-2 position-absolute">
                            {{-- <a href="/cadastro-de-servicos" class="text-secondary">
                                <i class="bi bi-arrow-left-circle-fill display-6 ml-5 botão-voltar"></i>
                            </a> --}}
                            <strong>
                                <p class="text-uppercase text-info text-muted">Cadastrando:
                                    @foreach($servico_atual as $recuperado)
                                    {{$recuperado->title}}
                                    @endforeach
                                </p>
                            </strong>
                        </div>
                    <div class="text-center mt-4">
                        <p class="text-info">Etapa 3 de 3</p>
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-success">Adicione os serviços e os links necessários.</p>
                    </div>
                    @if(isset($edit))
                    <form action="/editar-servicos-pt3" method="post" class="form-signin1 mt-0 pt-0">
                   
                    @else
                    <form action="/etapa-5/{{$uniqid}}" method="get" class="form-signin1 mt-0 pt-0">
                    
                    @endif

                        @csrf
                      
                        @foreach($servico_atual as $recuperado)
                            <input type="hidden" name="id_services" value="{{$recuperado->id}}">
                        @endforeach

                        <div class="d-flex row">
                            <div class="container col-sm-10 col-md-5 col-lg-5 form-floating">   
                                <input type="text" name="servico" class="form-control rounded-pill border-info text-success" id="floatingInput1" placeholder="Nome do Serviço" required>
                                <label class="form-label label-titulo text-center w-100" for="floatingInput1"><a class="text-success text-decoration-none">Nome do Serviço</a></label>
                            </div> 
                            <div class="container col-sm-10 col-md-5 col-lg-5 form-floating">   
                                <input type="text" name="link" class="form-control rounded-pill border-info text-success" id="floatingInput2" placeholder="Link do Serviço" required>
                                <label class="form-label label-titulo text-center w-100" for="floatingInput2"><a class="text-success text-decoration-none">Link do Serviço</a></label>
                            </div>
                            <div class="container text-center mt-1 mb-3 col-sm-4 col-md-1 col-lg-1">
                                <input class="btn btn-lg btn-outline-success" type="submit" value="Adicionar"></input>
                            </div>

                        </div>
                    </form>
                    
                    <div class="container justify-content-center text-center mt-3 row">
                        {{-- Formulário de exibição dos links com botão de excluir --}}
                        @foreach($links as $links_servicos)
                            <div class="col-4 mt-2">
                                <form action="/excluir_link/{{$links_servicos->id}}" method="POST" name="excluirLink" class="form_excluir_link col">
                                    @csrf 
                                    @method('DELETE')
                                    
        {{--uniqid--}}                  <input type="hidden" name="uniqid" value="@if(!isset($edit)){{$uniqid}}@endif">
                                    @if(isset($edit))
                                        <input type="hidden" name="edit" value="edit">
                                    @else
                                        <input type="hidden" name="edit" value="">
                                    @endif
                                    @foreach($servico_atual as $recuperado)
        {{--Id do seriço atual--}}      <input type="hidden" name="id_servico_atual" value="{{$recuperado->id}}">
                                    @endforeach

                                    <a href="{{$links_servicos->link}}" class="text-decoration-none bg-secondary text-light m-2 p-1 mt-3 rounded-pill">{{$links_servicos->nome}} 
    {{--Link e botão de excluir--}}     <button type="submit" value="apagar" class="bi bi-x p-1 btn btn-without-border"></button>
                                    </a>
        
                                </form>

                            </div>
                            
                        @endforeach
                    </div>
                  

                    <form action="/finalizar" method="get">
                        @csrf

                        @if(isset($edit))
                            <input type="hidden" name="edit" value="edit">
                        @else
                            <input type="hidden" name="edit" value="">
                        @endif
                        
                        <div class="text-center mt-5 mb-3">
                            @foreach($links as $links_servicos)
                            @endforeach
                                <button class="btn btn-lg btn-success rounded-pill @if(count($links) == 0) disabled @endif" type="button" data-bs-toggle="modal" data-bs-target="#finalizacao">Finalizar Cadastro</button>
                            <!-- Modal Comentado Funcionando -->
                            <div class="modal fade bd-example-modal-sm align-middle" id="finalizacao" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Atenção!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                        <div class="modal-body">
                                            @if(!isset($edit))
                                                <p>Finalizar cadastro?</p>
                                                <p>Após finalizar o cadastro, você poderá editar as informação clicando no botão de editar no card de exibição do serviço!</p>
                                            @else
                                                <p>Tem certeza que deseja alterar estes dados?</p>
                                                <p>Você pode editar quantas vezes for necessário. <br/> Confirme para finalizar!</p>
                                            @endif
                                        </div>
                                        
                                        <div class="d-inline modal-footer">
                                            <button class="btn btn-outline-success w-25" type="submit" value="Sim">Sim</button>
    
                                            <button class="btn btn-outline-danger w-25" data-bs-dismiss="modal" value="Não">Não</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 text-success">Adicione pelo menos 1 Serviço</p>
                        </div>
                        
                    </form>

                    
                </div>

                    
            </div>
        </div>
       
    </div>
@endsection