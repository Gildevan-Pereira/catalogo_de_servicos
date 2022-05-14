<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ìcones bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    {{-- Arquivos CSS bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> --}}
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   
    {{-- Meu arquivo CSS --}}
    <link href="/css/style.css" rel="stylesheet">

    {{-- Smartwizard --}}
    <link href="/node_modules/smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">

    {{-- ícones Material Designer --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- Ícones fontawesome --}}
    <link rel="stylesheet" href="/node_modules/font-awesome-4.7.0/css/font-awesome.min.css">

    {{-- JavaScript bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Poppers --}}
    <script src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>

    <link rel="shortcut icon" href="/img/logo-IF.png">

    <title>@yield('title')</title>

</head>
<body>

    <!-- Header(Cabeçalho) -->
    <header class="container-fluid cabecalho"></header>
      
        <nav  class="nav nav-dos-botoes-entrar-cadastrar">
        
            <div class="container mt-2" id="div_bemvindo">
                <p class="text-light"><small>Bem-vindo!</small>  <i class="fa fa-home">  </i></p>
            </div>
           
        </nav>
        
    
        <nav class="nav navbar navbar-expand-lg justify-content-center bg-success nav_logo">
            <div class="container justify-content-center">
                <img src="https://www.ifsertao-pe.edu.br/templates/sj_news/images/blue/logo.png" class="img-fluid h-sm-auto w-sm-50 h-lg-auto w-lg-25 logo my-3">
            </div>
        </nav>
    </header>

    <!-- Div com o título da Página -->
    <div class="container barra-secodary text-center mt-3 rounded-3 div-titulo">

        <p class="mt-1 pt-2 pb-2 textos-titulo">
            <strong><i class="bi bi-laptop"></i> Diretoria de Gestão da Tecnologia da Informação (DGTI)</strong>
            <br>
            <strong class="display-6"><strong>CATÁLOGO DE SERVIÇOS DE TI <i class="bi bi-speedometer2"></i></strong></strong>
        </p>

    </div>
    <main>
        <div class="container-fluid justify-content-center">
            <div class="row">
                @if(session('msg'))
                <p class="msg text-center">{{ session('msg')}}</p>
                @endif

               
            </div>
        </div>
    </main>
    <main>
        <div class="container-fluid justify-content-center">
            <div class="row">
                @if(session('error'))
                <p class="error text-center">{{ session('error')}}</p>
                @endif

               
            </div>
        </div>
    </main>
    
    @yield('content')
    





     <!-- Footer(Rodapé) -->
     <footer class="page-footer font-small bg-success pt-1 text-center">
        <div class="container-fluid  text-md-left">
            <nav class="navbar navbar-expand-sm navbar-light">
                <div class="container d-inline-block justify-content-center">
                    <img src="https://www.ifsertao-pe.edu.br/templates/sj_news/images/blue/logo.png" class="img-fluid h-25 w-25 mb-1">
                    <p class="texto_verde_claro">
                        <a class="text-decoration-none texto_verde_claro link_diretoria" target="__blank" href="https://www.ifsertao-pe.edu.br/index.php/a-instituicao/diretorias-sistemicas/gestao-da-tecnologia-da-informacao">
                            Diretoria de Gestão da Tecnologia da Informação (DGTI) | IF SERTÃO-PE
                        </a>
                    </p>
                    <p class="text-light email_footer">Dúvidas e/ou sugestões: dgti@ifsertao-pe.edu.br</p>
                    <p class="mt-2 mb-0">
                        <a class="text-light text-decoration-none lead fs-6 link_diretoria" target="__blank" href="https://www.linkedin.com/in/gildevan-francisco-pereira-878a1a187" style="font-family: Roboto;">
                            
                            Created By: Gildevan Francisco Pereira 
                            <i class="ms-1 bi bi-box-arrow-up-right"></i>
                            
                        </a>
                    </p>
                </div>
            </nav>
        </div>
    </footer>


    <script src="node_modules/bootstrap-validator/js/validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>


</body>
</html>