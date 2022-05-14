@extends('layouts.main')

@section('title', 'Serviços RNP')

@section('content')

<?php $title = "servicos-rnp";?>


    <div class="container mb-5">
        <div class="row">

            <ul class="nav flex-column col-sm-12 col-md-4 col-lg-4">
              

                @include('layouts.categorias')
               
                
            </ul>
            
            <div class="col-sm-12 col-md-8 col-lg-8 conteudo-scroll border" data-bs-spy="scroll" data-bs-target="#navbar-scrollspay" data-bs-offset="0" tabindex="0">
               
                    <nav>
                        <div class="nav nav-tabs justify-content-center row" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active col-6 text-center bg-dark text-light fs-4" id="nav-home-tab" data-toggle="tab" href="/cadastro-de-servicos" role="tab" aria-controls="nav-home" aria-selected="true">Cadastro de Serviços</a>
                          <a class="nav-item nav-link col-6 text-center bg-secondary text-secondary fs-4" data-toggle="tab" href="/todas-as-categorias" role="tab" aria-controls="nav-profile" aria-selected="false">Menu de Serviços</a>
                        </div>
                    </nav>
                    
                    <nav class="mt-4 pr-0">

                        
                        
                            
                           
                        <div class="container m-0 d-flex justify-content-sm-center justify-content-md-center justify-content-lg-center row">

                            @include('services.card')
    
                        </div> 
                        
                        @include('layouts.modal')
                       
                    </nav>
                    
            </div>
        </div>
       
    </div>
@endsection