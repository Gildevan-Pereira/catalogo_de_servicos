    @foreach($pesquisa as $result)
    
            <?php $categoria = $result->category?>

            <div class="card card-front rounded-3 cards-container @if($categoria == 'Acadêmico') bg-success @elseif($categoria == 'Administrativo') bg-danger @elseif($categoria == 'Geral') bg-info @elseif($categoria == 'Serviços RNP') bg-warning @elseif($categoria == 'Serviços Obsoletos') bg-secondary @endif text-white  m-3 mb-3 col-sm-4 col-md-6 col-lg-3" onload="return formSubmit()">
                <div class="card-body-fluid text-center mb-0">
                    <h5 class="card-title pt-2 text-truncate" data-toggle="tooltip" data-placement="top" title="{{$result->title}}">{{$result->title}}</h5>
                    <ul class="display-6 p-0 fs-4 pt-2">
                        <li class="list-group-item border-light bg-light rounded-pill">
                            <button type="submit" class="view_data btn-without-border bg-transparent border-none @if($categoria == 'Acadêmico') text-success @elseif($categoria == 'Administrativo') text-danger @elseif($categoria == 'Geral') text-info @elseif($categoria == 'Serviços RNP') text-warning @elseif($categoria == 'Serviços Obsoletos') text-gray @endif" data-bs-toggle="modal" data-bs-target="#visualizarModal{{$result->id}}" id="{{$result->id}}">Ver Mais</button>
                        </li>
                    </ul>
                </div>            
            </div>

    @endforeach


    @if(count($pesquisa) == 0 && $search)
        <p><strong>Não foi possível encontrar nem um serviço com o nome de "<justify class="text-danger">{{ $search }}</justify>".</strong> <a href="/todas-as-categorias">Ver todos</a></p>
    @elseif(count($pesquisa) == 0)
        <p><strong>Não há serviços cadastrados para esta pesquisa</strong><a href="/todas-as-categorias-front" class="ms-2 text-decoration-none">Ver todos</a></p>
    @endif
     
{{-- <script>
    
    function formSubmit()
{
     document.getElementById("form1").submit();
} 
</script> --}}
    