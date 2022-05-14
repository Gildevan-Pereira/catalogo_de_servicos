<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\RegisterController;

// -----------------------------------------
// Rotas para usuários não autenticados
// -----------------------------------------
    // Tela Inicial
    Route::get('/', [PageController::class, 'index']) ->name('login');

    // Route::get('/login', [PageController::class, 'login']);
    Route::post('/login2', [UserController::class, 'login2']);
    // rota de recuperação de senha
    Route::get('/recuperacao-de-senha', [UserController::class, 'recovery']);

    Route::post('/recuperacao-pass', [UserController::class, 'recovery_pass']);

    Route::get('/reset-password/{token}', [UserController::class, 'reset_pass']);

    Route::post('/resetar-senha', [UserController::class, 'resetar']);
// --------------------------------------------
// Fim das rotas para usuários não autenticados
// --------------------------------------------

// -------------------------------------------------------
// Grupo de rotas para usuários autenticados
// -------------------------------------------------------
Route::group(['middleware'=>['auth']], function(){
    
    // Função logout e redirecionamento
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    });

    // Rota de Criação de cadastro de usuário
    Route::post('/criar_cadastro', [UserController::class, 'store'])->middleware('auth');
    // Rota de acesso a tela de cadastro
    Route::get('/cadastro', [PageController::class, 'create']) ->name('cadastro')->middleware('auth');
    // rota de atualização de dados do usuário
    Route::get('/update/{id}', [UserController::class, 'update'])->middleware('auth');
    //Rota para deletar servicos
    Route::delete('/delete', [PageController::class, 'destroy'])->middleware('auth');
    //deletar usuário
    Route::delete('/delete_user/{id}', [UserController::class, 'delete_user'])->middleware('auth');
    //editar usuário
    Route::get('/edit_user/{id}', [UserController::class, 'edit_user'])->middleware('auth');
    //Rota para excluir links
    Route::delete('/excluir_link/{id_link}', [PageController::class, 'apagar'])->middleware('auth');
    // Função
    Route::get('/perfil', [PageController::class, 'profile'])->middleware('auth');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');
    
                                Route::get('/todas-as-categorias', [CategoriController::class, 'painel'])->middleware('auth');
                                Route::get('/academico', [CategoriController::class, 'academico'])->middleware('auth');
 /* Todas as rotas */           Route::get('/administrativo', [CategoriController::class, 'administrativo'])->middleware('auth');
 /* dos menus de categorias */  Route::get('/geral', [CategoriController::class, 'geral'])->middleware('auth');
                                Route::get('/servicos-rnp', [CategoriController::class, 'servicos_rnp'])->middleware('auth');
                                Route::get('/servicos-obsoletos', [CategoriController::class, 'servicos_obsoletos'])->middleware('auth');
                                Route::get('/desativados', [CategoriController::class, 'desativados'])->middleware('auth');
                    
    Route::get('/card', [PageController::class, 'painel'])->middleware('auth');

    // Route::post('/visualizar', [PageController::class, 'visualizar'])->middleware('auth');

    Route::post('/detalhes/{id}', [PageController::class, 'detalhes'])->middleware('auth');
    
    Route::get('/logs', [UserController::class, 'logs'])->middleware('auth');

    Route::get('/cadastro-de-servicos', [PageController::class, 'tela1'])->middleware('auth');
    
    Route::get('/finalizar', [PageController::class, 'finalizar'])->middleware('auth');
    
    Route::get('/cadastro-de-servicos-etapa2/{uniqid}', [PageController::class, 'tela5'])->name('cadastro-de-servicos-etapa2')->middleware('auth');
    
    Route::post('/etapa-1', [PageController::class, 'etapa1'])->middleware('auth');

    Route::get('/etapa-5/{uniqid}', [PageController::class, 'etapa5'])->middleware('auth');

    Route::get('/editar-servicos-pt1/{id}', [PageController::class, 'editar_pt1'])->middleware('auth');

    Route::get('/editar-pt2/{id}', [PageController::class, 'editar_pt2'])->middleware('auth');

    Route::get('/editar_link{id}', [PageController::class, 'editar_link'])->middleware('auth');

    Route::post('/editar-servicos-pt3', [PageController::class, 'editar_pt3'])->middleware('auth');
    
});    

// -------------------
// Rotas do Front End
// -------------------
        Route::get('/todas-as-categorias-front', [FrontController::class, 'painel']);
        Route::get('/academico-front', [FrontController::class, 'academico']);
        Route::get('/administrativo-front', [FrontController::class, 'administrativo']);
        Route::get('/geral-front', [FrontController::class, 'geral']);
        Route::get('/servicos-rnp-front', [FrontController::class, 'servicos_rnp']);
        Route::get('/servicos-obsoletos-front', [FrontController::class, 'servicos_obsoletos']);

        // Route::get('/card', [FrontController::class, 'painel'])->middleware('auth');
// ---------------------------
// Fim das rotas do Front End
// ---------------------------

// Auth::routes();

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('/profile/dashboard');
// })->name('dashboard');

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
