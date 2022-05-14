<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\Users;
use App\Models\services;
use App\Models\detalhes;
use App\Models\Logs;
use App\Models\Securit;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Redirect;


class UserController extends Controller
{

     // ---------------------------------
    // Dashboard
    // ---------------------------------
    public function dashboard(){

        $usuarios = Users::all();

        if(Auth::user()->tipo === "Padrão"){
            return redirect()->back();
        }else{
            return view('/profile/dashboard', ['usuarios' => $usuarios]);
        }
    }

    // ---------------------------------
    // Função para login de usuário
    // ---------------------------------
    public function login2(Request $login){
        
        $login->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        //$credentials = $request->only('email', 'password');
        $credentials = ['email'=>$login->email, 'password'=>$login->password];
        
        if(Auth::attempt($credentials)){
           
            return redirect('/todas-as-categorias');
        }else{
            return redirect()->back()->with('error', 'Não foi possível fazer login com essas credenciais!');
        }
    }

    //-----------------------------------------------
    // função de crição de cadastro de usuário
    //-----------------------------------------------
    public function store(Request $request) {

        $request->flash();
            
        $cadastrados = Users::all();
    
        $usuario = new Users;
        
        $usuario ->name = $request ->nome;
        $usuario ->email = $request ->email;
        $usuario ->tipo = $request ->tipo_usuario;
        $confirmacao = $request -> confirma_senha;
        $senha = $request -> senha; 

        if(!isset($request->tipo_usuario) && empty($request->tipo_usuario)){
            
            return redirect()->back()->with('error', 'Você precisa escolher um tipo de usuário!.');
        }
    
        foreach($cadastrados as $cadastros){
        
            if($request ->email == $cadastros->email){

                return redirect()->back()->with('error', 'Este email já está cadastrado, por favor, insira outro email.');
            }
            
        }
    
        if($confirmacao != $senha){
            
            return redirect()->back()->with('error', 'Confirmação de senhas Incompatíveis');
        }else{
            
            $usuario->password = Hash::make($request->senha);
            
            $usuario->save();
            return redirect()->back()->with('msg', 'Usuário cadastrado com sucesso!');
        }   
        
    }
    //-------------------------------------
    // Controle de atualização
    //-------------------------------------
    public function update(Request $request) {
            
        $dados = $request->all();
    
        if($dados['password'] != null){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }
    
        $update = Auth::user()->update($dados);
    
        if($update){
            return redirect('/perfil')->with('msg', 'Dados atualizados com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Dados não atualizados com sucesso!');
        }       
    
    }
    //------------------
    // Controle de Logs
    //------------------
    public function logs() {

        $logs = Logs::all()->sortByDesc('updated_at');

        return view('/profile/logs', ['logs' => $logs]);
    }
    //-----------------------------------
    //  Rota para Recuperação de senha
    //-----------------------------------
    public function recovery() {
        
        return view('/initial-files/recuperacao-de-senha');
    } 

    public function recovery_pass(Request $recovery){

        $recovery->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $recovery->only('email')
        );
        
        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function reset_pass($token) {
        return view('/initial-files/reset-password', ['token' => $token]);
    }

    public function resetar(Request $dados_reset) {

        $dados_reset->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $dados_reset->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect('/')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    
    }

    //------------------------------
    //Rota de edição de usuários 
    //------------------------------
    public function edit_user($id, Request $dados_user){

        $dados = Users::where([
                ['id', '=', $id]
        ])->update(
            ['name' => $dados_user->name, 
            'email' => $dados_user->email,
            'tipo' => $dados_user->tipo,
            ],
        );

        // $dados = DB::table('user')->where('id', $id)
        if($dados){
            return redirect()->back()->with('msg', 'Usuário atualizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Não foi possível atualizar este usuário!');
        }
    }
    //------------------------
    //Rota de excluir usuários
    //------------------------
    public function delete_user($id){
        
        Users::destroy($id);

        return redirect()->back()->with('msg', 'Usuário excluído com sucesso!');
        
    }
}

