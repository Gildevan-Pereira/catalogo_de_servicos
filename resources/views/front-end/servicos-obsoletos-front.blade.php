@extends('front-end.main')

@section('title', 'Serviços Obsoletos')

@section('content')

<?php $title = "servicos-obsoletos-front";?>


    <div class="container mb-5">
        <div class="row">

            <ul class="nav flex-column col-sm-12 col-md-4 col-lg-4">
              

                @include('front-end.categoriasfront')               
                
            </ul>
            
            <div class="col-sm-12 col-md-8 col-lg-8 conteudo-scroll border" data-bs-spy="scroll" data-bs-target="#navbar-scrollspay" data-bs-offset="0" tabindex="0">
               
                <nav class="mt-4 pr-0">
                        
                    <div class="container m-0 d-flex justify-content-sm-center justify-content-md-center justify-content-lg-center row">

                        @include('front-end.card')

                    </div> 

                    @include('front-end.modal')
                    
                </nav>
                    
            </div>
        </div>
       
    </div>
@endsection