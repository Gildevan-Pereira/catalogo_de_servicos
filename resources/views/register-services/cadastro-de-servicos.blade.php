@extends('layouts.main')

@section('title', 'Cadastro de Serviços')

@section('content')

<?php $title = "cadastro-de-servicos"; ?>

    <div class="container mb-5">
        <div class="row">

            <ul class="nav flex-column col-sm-12 col-md-4 col-lg-4">
              

                @include('layouts.categorias')
                
            </ul>
            
            <nav class="col-sm-12 col-md-8 col-lg-8 border bg-scroll scrollspay" data-bs-spy="scroll" data-bs-target="#navbar-scrollspay" data-bs-offset="0" tabindex="0">
                
                <nav>
                    <div class="nav nav-tabs justify-content-center row" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active col-6 text-center bg-secondary text-secondary fs-4" id="nav-home-tab" data-toggle="tab" href="/cadastro-de-servicos" role="tab" aria-controls="nav-home" aria-selected="true">Cadastro de Serviços</a>
                      <a class="nav-item nav-link col-6 text-center bg-dark text-light fs-4" data-toggle="tab" href="/todas-as-categorias" role="tab" aria-controls="nav-profile" aria-selected="false">Menu de Serviços</a>
                    </div>
                </nav>

                <div class="container-fluid text-center mt-3">
                       
                    <a href="#etapa1" type="button" class="btn btn-outline-primary">Etapa 1</a>
                    <a href="#etapa2" type="button" class="btn btn-outline-primary">Etapa 2</a>
                </div>
                
                <div class="scrollspay conteudo-scroll " id="navbar-scrollspay">

                    <div class="text-center mt-3">
                        <p class="text-info" id="etapa1">Etapa 1 de 3</p>
                    </div>
                    
                    @if(isset($edit))
                        @foreach ($servico_atual as $result)
                        <form action="/editar-pt2/{{$result->id}}" method="get" id="form_servico" class="form-signin1 mt-0 pt-0 row justify-content-center needs-validation" novalidate>
                            
                        <input type="hidden" name="id" value="{{ $result->id}}">
                        @endforeach
                        
                    @else
                        <form action="etapa-1" method="POST" id="form_servico" class="form-signin1 mt-0 pt-0 row justify-content-center needs-validation" novalidate>
                        @csrf

                    @endif
                        {{-- <script>
                            $('#form_servico').validator();

                        </script> --}}
                    
                        
                        <div class="container col-sm-10 col-lg-10 form-floating my-2">   
                            <input type="text" name="titulo" value="{{ $result->title ?? '', old('titulo')}}" class="form-control rounded-pill border-info text-center text-success" id="floatingInput1" placeholder="Ex: Francisco Hamilton"  data-error="Preencha o campo" required>
                            <label class="form-label label-titulo text-center text-success w-100" for="floatingInput1"><a class="text-success text-decoration-none">Título</a></label>
                            {{-- <div class="help-block with-errors"></div> --}}
                        </div>
                        {{-- <div class="container col-sm-10 col-lg-6 form-floating my-2">   
                            <input type="text" class="form-control rounded-pill border-info text-success" id="floatingInput1" placeholder="Ex: Francisco Hamilton">
                            <label class="form-label label-titulo text-center w-100" for="floatingInput1"><a class="text-success text-decoration-none">Link Principal</a></label>
                        </div> --}}
                        <div class="form-floating mt-4 col-sm-10 col-lg-10">
                            <input type="text" name="descricao" value="{{ $result->description ?? '', old('descricao')}}" class="form-control text-center text-success rounded-pill border-info" id="floatingInput2" placeholder="name@example.com" required></input>
                            <label class="form-label text-success mt-1 w-100 text-center teste-success" for="floatingInput2"><a class="text-success text-decoration-none">Descrição ou resumo do serviço...</a></label>
                        </div>
                    
                        <div class="col-sm-10 col-lg-10 mb-5 mt-0 form-floating">
                            <div class="form-floating mt-3 div-select d-flex justify-content-center ">
                                <select name="categoria" value="" class="form-select text-center text-success rounded-pill border-info" id="floatingSelect" required>
                                    <option value="" selected>Selecione uma categoria</option>
                                    @if(isset($edit))
                                        <option @if($result->category == "Acadêmico") selected @endif value="Acadêmico">Acadêmico</option>
                                        <option @if($result->category == "Administrativo") selected @endif value="Administrativo">Administrativo</option>
                                        <option @if($result->category == "Geral") selected @endif value="Geral">Geral</option>
                                        <option @if($result->category == "Serviços RNP") selected @endif value="Serviços RNP">Serviços RNP</option>
                                        <option @if($result->category == "Serviços Obsoletos") selected @endif value="Serviços Obsoletos">Serviços Obsoletos</option>
                                        <option @if($result->category == "Desativados") selected @endif value="Desativados">Desativados</option>
                                    @else
                                        <option value="Acadêmico">Acadêmico</option>
                                        <option value="Administrativo">Administrativo</option>
                                        <option value="Geral">Geral</option>
                                        <option value="Serviços RNP">Serviços RNP</option>
                                        <option value="Serviços Obsoletos">Serviços Obsoletos</option>
                                        <option value="Desativados">Desativados</option>
                                    @endif
                                </select>
                                <label class="label-titulo text-center w-100" for="floatingSelect"><a class="text-center text-success text-decoration-none">Categorias</a></label>
                            </div>
                        </div>

                        <div class="text-center mt-2">
                            <p class="text-info" id="etapa2">Etapa 2 de 5</p>
                        </div>
                        {{-- responsáveis --}}
                        <div class="d-flex mt-0 row">
                            {{-- Chamada do popover --}}
                         
                            <p class="text-gray lead text-center mb-0 fs-6 popoveres" data-bs-toggle="popover" title="Como Preencher?" data-bs-content="Exemplo: Francisco Hamilton - Departamento de Gerenciamento DGTI. Caso tenha mais de um, separe com ';' ou '/'"><i class="bi bi-info-circle-fill"></i>&nbsp Como preencher?</p>
                            
                            <script>
                                $(function () {
                                    $('[data-bs-toggle="popover"]').popover()
                                    
                                    })
                                    // Script de ativação do popover
                                    $('.popover-dismiss').popover({
                                        trigger: 'focus'
                                })    
                                
                                
                                </script>

                            <div class="container col-sm-10 col-lg-10 form-floating">   
                                <input type="text" name="responsaveis" value="{{ $result->responsible_department ?? '', old('responsaveis')}}" class="form-control rounded-pill border-info text-success" id="floatingInput1" placeholder="Responsável" required></input>
                                <label class="form-label label-titulo text-center w-100" for="floatingInput1"><a class="text-success text-decoration-none">Responsável/Departamento</a></label>
                            </div> 

                        </div>

                        
                        {{-- Contatos --}}
                        <div class="d-flex mt-2 row">
                            {{-- Chamada do popover --}}
                            <p class="text-gray lead text-center mb-0 fs-6 popoveres" data-bs-toggle="popover" title="Como Preencher?" data-bs-content="Você pode adicionar telefone ou celular, separe cada número com '/'. Ex: (87) 9 0000-0000 /  (87) 0000-0000"><i class="bi bi-info-circle-fill"></i>&nbsp Como preencher?</p>
                            
                            <div class="container col-sm-10 col-lg-10 form-floating">   
                                <input type="text" name="contato" value="{{ $result->contact ?? '', old('contato')}}" class="form-control rounded-pill border-info text-success" id="floatingInput1" placeholder="(87) 9 0000-0000 /  (87) 0000-0000" required></input>
                                <label class="form-label label-titulo text-center w-100" for="floatingInput1"><a class="text-success text-decoration-none">Contato</a></label>
                            </div> 
                        
                        </div>
                        {{-- Email --}}
                        <div class="d-flex mt-2 row">
                            {{-- Chamada do popover --}}
                            <p class="text-gray lead text-center mb-0 fs-6 popoveres" data-bs-toggle="popover" title="Como Preencher?" data-bs-content="Adicione todos oe emails necessários, separe com ';' ou '/'"><i class="bi bi-info-circle-fill"></i>&nbsp Como preencher?</p>

                            <div class="container col-sm-10 col-lg-10 form-floating">   
                                <input type="text" name="email" value="{{ $result->email ?? '', old('email')}}" class="form-control rounded-pill border-info text-success" id="floatingInput1" placeholder="Emails dos responsáveis" required></input>
                                <label class="form-label label-titulo text-center w-100" for="floatingInput1"><a class="text-success text-decoration-none">Emails dos Responsáveis</a></label>
                            </div> 
                            {{-- <div class="container text-center mt-1 mb-3 col-sm-1 col-lg-1">
                                <a href="#etapa2" class="btn btn-lg btn-secondary border-0 rounded-pill" type="submit" value="Adicionar">Adicionar</a>
                            </div> --}}

                        </div>
                        
                        {{-- Tags --}}
                        <div class="d-flex mt-2 row">
                            {{-- Chamada do popover --}}
                            <p class="text-gray lead text-center mb-0 fs-6 popoveres" data-bs-toggle="popover" title="Como Preencher?" data-bs-content="Adicione as tagas, ou seja, palavras chaves para facilitar a busca. (Sempre Insira o Título como palavra chave!)."><i class="bi bi-info-circle-fill"></i>&nbsp Como preencher?</p>

                            <div class="container col-sm-10 col-lg-10 form-floating">   
                                <input type="text" name="chave" value="{{ $result->chave ?? '', old('chave')}}" class="form-control rounded-pill border-info text-success" id="floatingInput1" placeholder="Palavras Chaves" required></input>
                                <label class="form-label label-titulo text-center w-100" for="floatingInput1"><a class="text-success text-decoration-none">Palavras Chave</a></label>
                                <small class="text-center text-gray"><p><i class="bi bi-info-circle-fill"></i>&nbsp Sempre insira o Título como palavra chave!</p></small>
                            </div> 
                            {{-- <div class="container text-center mt-1 mb-3 col-sm-1 col-lg-1">
                                <a href="#etapa2" class="btn btn-lg btn-secondary border-0 rounded-pill" type="submit" value="Adicionar">Adicionar</a>
                            </div> --}}

                        </div>
                      
                     
    
                        <div class="text-center mt-2 mb-3">
                            <input class="btn btn-lg btn-outline-success" type="button" value="Etapa 3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></input>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Atenção!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que deseja adicionar este serviço?</p>
                                        <p>Após confirmar, o serviço será adicionado e você será redirecionado para outra página, para adicionar os links dos serviços e não poderá retroceder para esta etapa!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" onclick="return recarregar()" class="btn btn-outline-success">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </form>
                </div>       
                <script>
                    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
                    (function() {
                      'use strict';
                      window.addEventListener('load', function() {
                        // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
                        var forms = document.getElementsByClassName('needs-validation');
                        // Faz um loop neles e evita o envio
                        var validation = Array.prototype.filter.call(forms, function(form) {
                          form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                              alert('Preencha todos os campos!')
                            }
                            form.classList.add('was-validated');
                          }, false);
                        });
                      }, false);
                    })();
                </script>
                {{-- <script>
                   function recarregar(){
                   var timer = setInterval(function() {   
                        clearInterval(timer);  
                        location.reload();
                    }, 100);
                }

                    // function abrirLink(event){
                    //     event.preventDefault();
                    //     var url = $(event.target).attr('href');
                    //     window.open(url);
                    //     location.reload();
                    // }
                </script> --}}
               

               

                


            </nav>
            
        </div>
       
    </div>
@endsection