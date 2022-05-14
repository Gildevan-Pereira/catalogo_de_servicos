
@if($title != 'cadastro-de-servicos' or 'cadastro-de-servicos-etapa5')  
    <form action="<?php '/' . $title?>" method="GET" class="d-flex">
        <input class="form-control me-2 rounded-pill border-info" name="search" type="search" placeholder="Pesquisa..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
    </form>
@else
    <form action="/todas-as-categorias" method="GET" class="d-flex">
        <input class="form-control me-2 rounded-pill border-info" name="search" type="search" placeholder="Pesquisa..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
    </form>
@endif

<li class="nav-item">

    <a class="nav-link active mt-3" href="/todas-as-categorias">
        <i class="bi bi-grid-fill text-success fs-4"></i>  
        <label class="h6 text-gray">CATEGORIAS DE SERVIÇOS</label>
    </a>
    
</li>
<div class="container">
    <li class="nav-item">
        <a class="nav-link" href="/todas-as-categorias">
            <!-- <i class="material-icons text-success fs-4"> school</i> -->
            <i class="fa fa-th-list text-dark fs-5"></i>
            <strong class="@if($title == 'todas-as-categorias') border-bottom border-dark @endif">
               
                <label class="text-dark text-category">TODAS AS CATEGORIAS</label>
                
            </strong>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/academico">
           
            <i class="fa fa-graduation-cap text-success fs-5"  aria-hidden="true"></i>
            <strong class="@if($title == 'academico') border-bottom border-success @endif">
                <label class="text-success text-category">ACADÊMICO</label>
            </strong>  
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/administrativo">
            <i class="fa fa-line-chart text-danger fs-5"></i>
            <strong class="@if($title == 'administrativo') border-bottom border-danger @endif">
                <label class="text-danger text-category">ADMINISTRATIVO</label>
            </strong>  
        </a>
    </li> 
    <li class="nav-item">
        <a class="nav-link" href="/geral">
            <i class="fa fa-cubes text-info fs-5"  aria-hidden="true"></i>
            <strong class="@if($title == 'geral') border-bottom border-info @endif">
                <label class="text-info text-category">GERAL</label>
            </strong>  
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/servicos-rnp">
            <i class="fa fa-globe text-warning fs-3" aria-hidden="true"></i>
            <strong class="@if($title == 'servicos-rnp') border-bottom border-warning @endif">
                <label class="text-warning text-category">SERVIÇOS RNP</label>
            </strong>  
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/servicos-obsoletos">
            <i class="bi bi-exclamation-triangle-fill text-gray fs-4"></i>
            <strong class="@if($title == 'servicos-obsoletos') border-bottom border-secondary @endif">
                <label class="text-gray text-category">SERVIÇOS OBSOLETOS</label>
            </strong>  
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/desativados">
            <i class="bi bi-eye-slash-fill text-dark fs-4"></i>
            <strong class="@if($title == 'desativados') border-bottom border-dark @endif">
                <label class="text-dark text-category">DESATIVADOS</label>
            </strong>  
        </a>
    </li>
</div>