@foreach($pesquisa as $result)
    
    <div class="text-center mt-5 mb-3">
        <!-- <a href="#etapa2" class="btn btn-lg btn-success rounded-pill" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm" type="submit" value="Próximo">Próximo</a> --> 

        <!-- Modal Comentado Funcionando -->
        <div class="modal fade bd-example-modal-md align-middle" id="visualizarModal{{$result->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header justify-content-center text-success">
                        <div class="w-100">
                            <h5 class="modal-title"><i class="bi bi-card-heading"></i> &nbsp {{$result->title}}</h5>
                        </div>
                        <button type="button" class="close float-right btn-without-border" data-bs-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container border border-success rounded-3"  style="background-color: #D7D7D7;">
                            <p>
                                {{$result->description}}
                            </p>
                        </div>
                        <h6 class="modal-title text-success mt-3 mb-3"><i class="fs-4 bi bi-link-45deg"></i>&nbsp LINKS DE SERVIÇOS</h6>
                        <div class="d-flex">
                            
                            
                           <?php
                            $detalhes = DB::table('detalhes')->where('id_services', $result->id)->get()
                            
                            ?> 
                            @foreach($detalhes as $dados)
                                    <div id="detalhes">
                                        <small>
                                            <a id="id_service" href="{{$dados->link}}" class="rounded border border-light text-decoration-none m-1 p-1 text-gray h6 fs-6" style="background-color: #D7D7D7;">{{$dados->nome}}</a>
                                        </small>
                                    </div>                  
                                
                            @endforeach
                        </div>
                        
                        <h6 class="modal-title text-success mt-3 mb-3"><i class="bi bi-people-fill"></i>&nbsp RESPONSÁVEIS / DEPARTAMENTO</h6>
                        
                        <div>
                            <small>
                                <p class="h6 fs-6">{{$result->responsible_department}}</p>
                            </small>
                        </div>
                        
                        <h6 class="modal-title text-success mt-3 mb-3"><i class="bi bi-telephone-fill"></i>&nbsp CONTATO</h6>
                        
                        <div class="d-flex">
                            <div>
                                <small>
                                    <p class="rounded border border-light h6 fs-6" style="background-color: #D7D7D7;">{{$result->contact}}</p>
                                </small>
                            </div>
                         
                        </div>
                        
                        <h6 class="modal-title text-success mt-3 mb-3"><i class="bi bi-envelope-fill"></i>&nbsp EMAIL</h6>
                        
                        <div>
                            <small>
                                <p class="h6 fs-6">{{$result->email}}</p>
                            </small>
                        </div>


                    </div>
                </div>
            </div>
        </div> 
    </div>

@endforeach