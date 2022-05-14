<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\services;
use App\Models\detalhes;
use App\Models\Logs;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PageController extends Controller
{

    // Página Inicial
    public function index() {
        return view('/initial-files/index');
        
    }   
    
    // Acesso para a rota da tela de cadastro
    public function create() {

        if(Auth::user()->tipo === "Padrão"){
            return redirect()->back();
        }else{
            return view('/initial-files/cadastro');
        }

    }
    
    // Perfil de Usuário
    public function profile() {        
        
        return view('/profile/perfil');
    }
    
    // Função para excluir serviços
    public function destroy(Request $id){

        $usuario = Auth::user();
        
        $excluiu = DB::table('services')->where('id', $id->id)->get();

        DB::table('detalhes')->where('id_services', $id->id)->delete();
        services::destroy($id->id);

        $logs = new Logs;

        foreach($excluiu as $dados){
            
            $logs ->user = $usuario ->name;
            $logs ->action = "Excluiu";
            $logs ->nome_servico = $dados ->title;
            $logs ->categoria = $dados ->category;
        }        
        
        $logs->save();

        return redirect()->back()->with('msg', 'Serviço excluído com sucesso!');
    }


// Etapa 1
    public function tela1() {
        return view('/register-services/cadastro-de-servicos');
    }
    public function etapa1(Request $etapa1) {
        
        $etapa1->flash();
        
        if(empty($etapa1)){
            return redirect()->back()->with('error', 'Serviço não adicionado!');
            
        }else{     

            $validador = services::all();

            $uniqid = Str::random(9);

            $servico = new services;
            
            $servico ->title = $etapa1 ->titulo;
            $servico ->description = $etapa1 ->descricao;
            $servico ->category = $etapa1 ->categoria;
            $servico ->responsible_department = $etapa1 ->responsaveis;
            $servico ->contact = $etapa1 ->contato;
            $servico ->email = $etapa1 ->email;
            $servico ->chave = $etapa1 ->chave;
            $servico ->insertion_code = $uniqid;

          

            foreach($validador as $result){

                if($etapa1->titulo == $result->title){
                    return redirect()->back()->with('error','Já existe um serviço cadastrado com este nome!');
                }
            }

            $servico->save();

            $servico_atual = DB::table('services')->where('insertion_code', $uniqid)->get();
            
            foreach($servico_atual as $recebido){
                $id = $recebido->id;
                $links = DB::table('detalhes')->where('id_services', $id)->get();
            }

            $usuario = Auth::user();

            $logs = new Logs;

            foreach($servico_atual as $dados){
                
                $logs ->user = $usuario ->name;
                $logs ->action = "Adicionou";
                $logs ->nome_servico = $dados ->title;
                $logs ->categoria = $dados ->category;
            }        
            
            $logs->save();
                
            return view('/register-services/cadastro-de-servicos-etapa2', ['uniqid' => $uniqid, 'servico_atual' => $servico_atual, 'links' => $links])->with('msg', 'Etapa 1 e 2 concuídas com sucesso, agora adicione os links para finalizar!');
            // Artisan :: call ('cache: clear')
        }
       

    }

// // Etapa 2
//     public function tela2() {
//         return view('/register-services/cadastro-de-servicos-etapa2');
//     }

    public function finalizar(request $finalizar) {

        
        Artisan::call('cache:clear'); 

        if(isset($finalizar->edit)){
            return redirect('/todas-as-categorias')->with('msg', 'Serviço editado com Sucesso!');
        }else{
            return redirect('/cadastro-de-servicos')->with('msg', 'Cadastro de Serviço Finalizado com Sucesso!');
        }
    }
    
    // // Etapa 4
    //     public function tela4() {
//         return view('/register-services/cadastro-de-servicos-etapa4');
//     }

//     public function etapa4() {
//         return view('/register-services/cadastro-de-servicos-etapa2');
//     }

// Etapa 5
    public function etapa5($uniqid, Request $etapa5) {
        
        $links = new detalhes;
            
        $links ->id_services = $etapa5 ->id_services;
        $links ->nome = $etapa5 ->servico;
        $links ->link = $etapa5 ->link;
        
       
        $links->save();
        
        $links = DB::table('detalhes')->where('id_services', $etapa5->id_services)->get();
        // return redirect()->back()->with('error', 'Serviço não adicionado!');
        $servico_atual = DB::table('services')->where('id', $etapa5->id_services)->get();
        
        return view('/register-services/cadastro-de-servicos-etapa2', ['uniqid' => $uniqid, 'servico_atual' => $servico_atual, 'links' => $links])->with('msg', 'Link adicionado com sucesso!');
           
    }

     //Apagar links
     public function apagar($id_link, Request $dados_link){
        
        // detalhes::findeOrFail($id_link)->delete();
        detalhes::destroy($id_link);

        
        $id_servico = $dados_link->id_servico_atual; //recupera o ID do serviço que está sendo exibido
        // $id_link = $dados_link->id_link; //recupera o ID do link que está sendo exibido
        $servico_atual = DB::table('services')->where('id', $id_servico)->get()->toArray(); //recebe todos os dados da tabela de serviços
       
        
        foreach($servico_atual as $resultado){
            
            $id = $resultado->id;
            
            $links = DB::table('detalhes')->where('id_services', $id)->get()->toArray(); //recupera todos os dados da tabela de detalhes, onde encontrar a chave
        }
        
        if(isset($dados_link->edit)){
            $edit = "Editando";
            return view('/register-services/cadastro-de-servicos-etapa2', [ 'edit' => $edit, 'links' => $links, 'servico_atual' => $servico_atual]);
        }else{
            $uniqid = $dados_link -> uniqid;
            return view('/register-services/cadastro-de-servicos-etapa2', [ 'uniqid' => $uniqid, 'links' => $links, 'servico_atual' => $servico_atual]);
        }

    }




    public function tela5($uniqid) {

        if ($uniqid == ""){
            return view('/register-services/cadastro-de-servicos');
            
        }else{
            return view('/register-services/cadastro-de-servicos-etapa2');
        }
    }

   
    public function editar_pt1($id) {

        $edit = "Editar";

        $servico_atual = DB::table('services')->where('id', $id)->get();

        $links = DB::table('detalhes')->where('id_services', $id)->get();
        
        // return redirect()->back()->with('error', 'Serviço não adicionado!');

        return view('/register-services/cadastro-de-servicos', ['servico_atual' => $servico_atual, 'links' => $links, 'edit' => $edit]);
    }

    
    public function editar_pt2(Request $update) {

        $edit = "Editando";
        
        $dados_atualizados = DB::table('services')->where('id', $update->id)->update(
            ['title' => $update->titulo, 
            'description' => $update->descricao,
            'category' => $update->categoria,
            'responsible_department' => $update->responsaveis,
            'contact' => $update->contato,
            'email' => $update->email,
            'chave' => $update->chave],
        );
        
        if($dados_atualizados){
            
            $servico_atual = DB::table('services')->where('id', $update->id)->get();
            
            $links = DB::table('detalhes')->where('id_services', $update->id)->get();

            $usuario = Auth::user();

            $logs = new Logs;

            foreach($servico_atual as $dados){
                
                $logs ->user = $usuario ->name;
                $logs ->action = "Editou";
                $logs ->nome_servico = $dados ->title;
                $logs ->categoria = $dados ->category;
            }        
            
            $logs->save();
            
            return view('/register-services/cadastro-de-servicos-etapa2', ['servico_atual' => $servico_atual, 'links' => $links, 'edit' => $edit])->with('msg', 'Serviço atualizado, agora edite os links e finalize!');
        }else{
            $servico_atual = DB::table('services')->where('id', $update->id)->get();
            
            $links = DB::table('detalhes')->where('id_services', $update->id)->get();
            
            return view('/register-services/cadastro-de-servicos-etapa2', ['servico_atual' => $servico_atual, 'links' => $links, 'edit' => $edit])->with('msg', 'Erro ao atualizar');
        }
        
    }

    
    public function editar_pt3(Request $edit_link) {
        
        $edit = "Editando";

        $links = new detalhes;
            
        $links ->id_services = $edit_link ->id_services;
        $links ->nome = $edit_link ->servico;
        $links ->link = $edit_link ->link;
        
       
        $links->save();
        
        $links = DB::table('detalhes')->where('id_services', $edit_link->id_services)->get();
        // return redirect()->back()->with('error', 'Serviço não adicionado!');
        $servico_atual = DB::table('services')->where('id', $edit_link->id_services)->get();
        
        return view('/register-services/cadastro-de-servicos-etapa2', ['servico_atual' => $servico_atual, 'links' => $links, 'edit' => $edit])->with('msg', 'Link adicionado com sucesso!');
     
    }
        
}


