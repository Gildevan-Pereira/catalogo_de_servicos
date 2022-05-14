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

class FrontController extends Controller
{
     // Painel com todas as categorias
     public function painel() {

        $detalhes = "";

        $search = request('search');
        
        if($search){

            $pesquisa = services::where([
                ['chave', 'like', '%'.$search.'%'],
                ['category', '!=', 'Desativados']
            ])->get();

        }else{
            $pesquisa = services::where([
                ['category', '!=', 'Desativados']
            ])->get();
        }
        return view('/front-end/todas-as-categorias-front', ['pesquisa' => $pesquisa, 'search' => $search]);
    }

    // Menú de serviços academico
    public function academico() {

        $detalhes = "";
        $search = request('search');
        
        if($search){

            $pesquisa = services::where([
                ['chave', 'like', '%'.$search.'%'],
                ['category', 'like', 'Acadêmico']
            ])->get();

        }else{
            $pesquisa = services::where([
                ['category', 'like', 'Acadêmico']
            ])->with('detalhes')->get();

            // ->with('detalhes')->get();
        }
   
        return view('/front-end/academico-front', ['pesquisa' => $pesquisa, 'search' => $search]);
    }
    // Menú de serviços administrativo
    public function administrativo() {

        $detalhes = "";
        $search = request('search');
        
        if($search){

            $pesquisa = services::where([
                ['chave', 'like', '%'.$search.'%'],
                ['category', 'like', 'Administrativo']
            ])->get();

        }else{
            $pesquisa = services::where([
                        ['category', 'like', 'Administrativo']
            ])->get();
        }
            
        return view('/front-end/administrativo-front', ['pesquisa' => $pesquisa, 'search' => $search]);
    }
    // Menú de serviços geral
    public function geral() {

        $detalhes = "";
        $search = request('search');
        
        if($search){

            $pesquisa = services::where([
                ['chave', 'like', '%'.$search.'%'],
                ['category', 'like', 'geral']
            ])->get();

        }else{
            $pesquisa = services::where([
                ['category', 'like', 'geral']
            ])->get();

        }
    
        return view('/front-end/geral-front', ['pesquisa' => $pesquisa, 'search' => $search]);
    }

    // Menú de serviços serviços-rnp
    public function servicos_rnp() {

        $detalhes = "";
        $search = request('search');
    
        if($search){

            $pesquisa = services::where([
                ['chave', 'like', '%'.$search.'%'],
                ['category', 'like', 'Serviços RNP']
            ])->get();

        }else{
            $pesquisa = services::where([
                ['category', 'like', 'Serviços RNP']
            ])->get();
        }
        return view('/front-end/servicos-rnp-front', ['pesquisa' => $pesquisa, 'search' => $search]);
    }
    
    // Menú de serviços serviços-obsoletos
    public function servicos_obsoletos() {

        $detalhes = "";
        $search = request('search');
        
        if($search){

            $pesquisa = services::where([
                ['chave', 'like', '%'.$search.'%'],
                ['category', 'like', 'Serviços Obsoletos']
            ])->get();

        }else{
            $pesquisa = services::where([
                ['category', 'like', 'Serviços Obsoletos']
            ])->get();
        }
            

        
        return view('/front-end/servicos-obsoletos-front', ['pesquisa' => $pesquisa, 'search' => $search]);
    }

}
