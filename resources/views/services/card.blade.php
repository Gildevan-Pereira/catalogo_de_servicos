    @foreach($pesquisa as $result)
    
            <?php $categoria = $result->category?>

            <div class="card cards-container @if($categoria == 'Acadêmico') bg-success @elseif($categoria == 'Administrativo') bg-danger @elseif($categoria == 'Geral') bg-info @elseif($categoria == 'Serviços RNP') bg-warning @elseif($categoria == 'Serviços Obsoletos') bg-secondary @elseif($categoria == 'Desativados') bg-dark   @endif text-white  m-3 mb-3 col-sm-4 col-md-6 col-lg-3" onload="return formSubmit()">
                <div class="card-body-fluid text-center mb-0">
                    <h5 class="card-title text-truncate" data-toggle="tooltip" data-placement="top" title="{{$result->title}}">{{$result->title}}</h5>
                    <ul class="display-6 p-0 fs-3">
                        <li class="list-group-item border-light bg-transparent">
                            {{-- <form action="" autocomplete="off" name="formVisualizar" class=""> --}}
                                @csrf
                                <input type="hidden" id="id_service" name="id_service" value="{{$result->id}}">
                                <button type="submit" class="btn-without-border view_data bg-transparent border-none text-light bi bi-eye fs-2" data-bs-toggle="modal" data-bs-target="#visualizarModal{{$result->id}}" id="{{$result->id}}"></button>

                                {{-- data-bs-toggle="modal" data-bs-target=".bd-example-modal-md" --}}
                            {{-- </form> --}}
                            <script>
                                // $(function(){
                                // $('form[name="formVisualizar"]').submit(function(event){
                                //     event.preventDefault();
                                //     // alert('falhou');
                                //     $.ajax({
                                //         url: "{{'/cursolaravel/app/Http/Controllers/PageController.php/visualizar'}}",
                                //         type: 'post',
                                //         data: $(this).serialize(),
                                //         dataType: 'json',
                                //         success: function(response){
                                //             // console.log(response);
                                //             if(response.success === true){
                                //                 alert('funcionou');
                                //                 // ($pesquisa, $detalhes);
                                //                 // $('#visualizarModal').modal('show');
                                //             }else{
                                //                 alert('falhou');
                                //             }
                                //         }     
                                    
                                //         //o retorno do processamento
                                //     });
                                // })
                            });
                            </script>
                        </li>
                        <script>
                            // $(document).ready(function(){
                            //     $(document).on('click', '.view_data', function(){
                            //        var id_service = $(this).attr("id");
                                    
                            //        if(id_service !== ""){
                            //            var dados = {
                            //                id_service: id_service
                            //            };

                            //            $.post('/visualizar', dados, function(retorna){
                            //                 $('#visualizarModal').modal('show');
                            //            });
                            //        }
                            //     });

                            // });
                            
                        </script>
                        <li class="list-group-item border-light bg-transparent">
                            <form action="/editar-servicos-pt1/{{$result->id}}" method="get" class="">
                                @csrf
                                <button type="submit" class="btn-without-border botao_edit_card bg-transparent border-none text-light bi bi-pencil-square"></button>
                            </form>
                        </li>
                        {{-- <a href="/delete/{{$result->id}}" class="text-light"></a> --}}
                       {{-- @include('layouts.modal') --}}
                       <li class="list-group-item border-light bg-transparent">
                           <form action="/delete" method="post" class="">
                               @csrf
                               @method('DELETE')
                               <input type="hidden" name="id" value="{{$result->id}}">
                               <button  type="button" class="btn-without-border bi bi-trash bg-transparent border-none text-light" data-bs-toggle="modal" data-bs-target="#modalConfirmacao{{$result->id}}"></button>
   
                                   <!-- Modal Confirmação de exclusão -->
                               <div class="modal fade modal" id="modalConfirmacao{{$result->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h3 class="modal-title text-dark" id="mySmallModalLabel">Atenção!</h3>
                                               <button type="button" class="close btn-without-border" data-bs-dismiss="modal" aria-label="Fechar">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <p class="text-dark lead fs-3">Tem certeza que deseja excluir este serviço?</p>
                                           </div>
                                           <div class="modal-footer justify-content-center">
                                               <button type="button" class="btn btn-success" data-bs-dismiss="modal">Não</button>
                                               <button type="submit" class="btn btn-danger">Excluir</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </li>
                    </ul>
                </div>            
            </div>

    @endforeach


    @if(count($pesquisa) == 0 && $search)
        <p><strong>Não foi possível encontrar nem um serviço com o nome de "<justify class="text-danger">{{ $search }}</justify>".</strong> <a href="/todas-as-categorias">Ver todos</a></p>
    @elseif(count($pesquisa) == 0)
        <p><strong>Não há serviços cadastrados para esta pesquisa</strong><a href="/todas-as-categorias" class="ms-2 text-decoration-none">Ver todos</a></p>
    @endif
     
<script>
    
    function formSubmit()
{
     document.getElementById("form1").submit();
} 
</script>
    