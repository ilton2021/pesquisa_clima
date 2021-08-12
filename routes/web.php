<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('/logar', [App\Http\Controllers\UserController::class, 'telaLogin'])->name('telaLogin');
Route::post('/logar', [App\Http\Controllers\UserController::class, 'telaLogin'])->name('telaLogin');
Route::get('/passwords/reset', [App\Http\Controllers\UserController::class, 'telaReset'])->name('telaReset');
Route::get('/usuario_gestor', [App\Http\Controllers\HomeController::class, 'usuario_unidade'])->name('usuario_unidade');
Route::post('/usuario_gestor', [App\Http\Controllers\HomeController::class, 'verificarUsuario'])->name('verificarUsuario');
Route::get('/pesquisa/{id}', [App\Http\Controllers\HomeController::class, 'pesquisa'])->name('pesquisa');  
Route::get('/pesquisaRH/{id}', [App\Http\Controllers\HomeController::class, 'pesquisaRH'])->name('pesquisaRH');
Route::post('/pesquisaRH/{id}', [App\Http\Controllers\HomeController::class, 'storePergRH'])->name('storePergRH');
Route::get('/pesquisaEstrutura/{id}', [App\Http\Controllers\HomeController::class, 'pesquisaEstrutura'])->name('pesquisaEstrutura');
Route::post('/pesquisaEstrutura/{id}', [App\Http\Controllers\HomeController::class, 'storePergEstrutura'])->name('storePergEstrutura');
Route::get('/pesquisaGestao/{id}', [App\Http\Controllers\HomeController::class, 'pesquisaGestao'])->name('pesquisaGestao');
Route::post('/pesquisaGestao/{id}', [App\Http\Controllers\HomeController::class, 'storePergGestao'])->name('storePergGestao');

Auth::routes();

Route::middleware(['auth'])->group( function() {
    //Graficos e Menu
    Route::get('/menus', [App\Http\Controllers\HomeController::class, 'menus'])->name('menus');
    Route::get('/graficos', [App\Http\Controllers\HomeController::class, 'graficos'])->name('graficos');
    Route::get('/graficos1', [App\Http\Controllers\HomeController::class, 'graficos1'])->name('graficos1');
    Route::post('/graficos1', [App\Http\Controllers\HomeController::class, 'pesquisaGraficos1'])->name('pesquisaGraficos1');
    Route::get('/graficos2', [App\Http\Controllers\HomeController::class, 'graficos2'])->name('graficos2');
    Route::post('/graficos2', [App\Http\Controllers\HomeController::class, 'pesquisaGraficos2'])->name('pesquisaGraficos2');
    Route::get('/graficos3', [App\Http\Controllers\HomeController::class, 'graficos3'])->name('graficos3');
    Route::post('/graficos3', [App\Http\Controllers\HomeController::class, 'pesquisaGraficos3'])->name('pesquisaGraficos3');
    Route::get('/graficos4', [App\Http\Controllers\HomeController::class, 'graficos4'])->name('graficos4');
    Route::post('/graficos4', [App\Http\Controllers\HomeController::class, 'pesquisaGraficos4'])->name('pesquisaGraficos4');
    Route::get('/graficos5', [App\Http\Controllers\HomeController::class, 'graficos5'])->name('graficos5');
    Route::post('/graficos5', [App\Http\Controllers\HomeController::class, 'pesquisaGraficos5'])->name('pesquisaGraficos5');
    //Perguntas
    Route::get('/cadastroPerguntas', [App\Http\Controllers\PerguntasController::class, 'cadastroPerguntas'])->name('cadastroPerguntas');
    Route::get('/cadastroPerguntas/novo', [App\Http\Controllers\PerguntasController::class, 'cadastroNovaPergunta'])->name('cadastroNovaPergunta');
    Route::get('/cadastroPerguntas/alterar/{id}', [App\Http\Controllers\PerguntasController::class, 'alterarPergunta'])->name('alterarPergunta');
    Route::get('/cadastroPerguntas/excluir/{id}', [App\Http\Controllers\PerguntasController::class, 'excluirPergunta'])->name('excluirPergunta');
    Route::post('/cadastroPerguntas/novo', [App\Http\Controllers\PerguntasController::class, 'storePerguntas'])->name('storePerguntas');
    Route::post('/cadastroPerguntas/alterar/{id}', [App\Http\Controllers\PerguntasController::class, 'updatePergunta'])->name('updatePergunta');
    Route::post('/cadastroPerguntas/excluir/{id}', [App\Http\Controllers\PerguntasController::class, 'destroyPergunta'])->name('destroyPergunta');
    //Categorias
    Route::get('/cadastroCategorias', [App\Http\Controllers\CategoriaController::class, 'cadastroCategorias'])->name('cadastroCategorias');
    Route::get('/cadastroCategorias/novo', [App\Http\Controllers\CategoriaController::class, 'cadastroNovaCategorias'])->name('cadastroNovaCategorias');
    Route::get('/cadastroCategorias/alterar/{id}', [App\Http\Controllers\CategoriaController::class, 'alterarCategorias'])->name('alterarCategorias');
    Route::get('/cadastroCategorias/excluir/{id}', [App\Http\Controllers\CategoriaController::class, 'excluirCategorias'])->name('excluirCategorias');
    Route::post('/cadastroCategorias/novo', [App\Http\Controllers\CategoriaController::class, 'storeCategorias'])->name('storeCategorias');
    Route::post('/cadastroCategorias/alterar/{id}', [App\Http\Controllers\CategoriaController::class, 'updateCategorias'])->name('updateCategorias');
    Route::post('/cadastroCategorias/excluir/{id}', [App\Http\Controllers\CategoriaController::class, 'destroyCategorias'])->name('destroyCategorias');
    //Respostas
    Route::get('/cadastroRespostas', [App\Http\Controllers\RespostasController::class, 'cadastroRespostas'])->name('cadastroRespostas');
    Route::get('/cadastroRespostas/novo', [App\Http\Controllers\RespostasController::class, 'cadastroNovaResposta'])->name('cadastroNovaResposta');
    Route::get('/cadastroRespostas/alterar/{id}', [App\Http\Controllers\RespostasController::class, 'alterarRespostas'])->name('alterarRespostas');
    Route::get('/cadastroRespostas/excluir/{id}', [App\Http\Controllers\RespostasController::class, 'excluirRespostas'])->name('excluirRespostas');
    Route::post('/cadastroRespostas/novo', [App\Http\Controllers\RespostasController::class, 'storeRespostas'])->name('storeRespostas');
    Route::post('/cadastroRespostas/alterar/{id}', [App\Http\Controllers\RespostasController::class, 'updateRespostas'])->name('updateRespostas');
    Route::post('/cadastroRespostas/excluir/{id}', [App\Http\Controllers\RespostasController::class, 'destroyRespostas'])->name('destroyRespostas');
    //Unidades
    Route::get('/cadastroUnidades', [App\Http\Controllers\UnidadeController::class, 'cadastroUnidades'])->name('cadastroUnidades');
    Route::get('/cadastroUnidades/novo', [App\Http\Controllers\UnidadeController::class, 'cadastroNovaUnidade'])->name('cadastroNovaUnidade');
    Route::get('/cadastroUnidades/alterar/{id}', [App\Http\Controllers\UnidadeController::class, 'alterarUnidades'])->name('alterarUnidades');
    Route::get('/cadastroUnidades/excluir/{id}', [App\Http\Controllers\UnidadeController::class, 'excluirUnidades'])->name('excluirUnidades');
    Route::post('/cadastroUnidades/novo', [App\Http\Controllers\UnidadeController::class, 'storeUnidades'])->name('storeUnidades');
    Route::post('/cadastroUnidades/alterar/{id}', [App\Http\Controllers\UnidadeController::class, 'updateUnidades'])->name('updateUnidades');
    Route::post('/cadastroUnidades/excluir/{id}', [App\Http\Controllers\UnidadeController::class, 'destroyUnidades'])->name('destroyUnidades');
    //Usuário
    Route::get('/cadastroUsuarios', [App\Http\Controllers\UsuarioController::class, 'cadastroUsuarios'])->name('cadastroUsuarios');
    Route::get('/cadastroUsuarios/novo', [App\Http\Controllers\UsuarioController::class, 'cadastroNovoUsuario'])->name('cadastroNovoUsuario');
    Route::get('/cadastroUsuarios/alterar/{id}', [App\Http\Controllers\UsuarioController::class, 'alterarUsuarios'])->name('alterarUsuarios');
    Route::get('/cadastroUsuarios/excluir/{id}', [App\Http\Controllers\UsuarioController::class, 'excluirUsuarios'])->name('excluirUsuarios');
    Route::post('/cadastroUsuarios/novo', [App\Http\Controllers\UsuarioController::class, 'storeUsuarios'])->name('storeUsuarios');
    Route::post('/cadastroUsuarios/alterar/{id}', [App\Http\Controllers\UsuarioController::class, 'updateUsuarios'])->name('updateUsuarios');
    Route::post('/cadastroUsuarios/excluir/{id}', [App\Http\Controllers\UsuarioController::class, 'destroyUsuarios'])->name('destroyUsuarios');
    //Gestores
    Route::get('/cadastroGestores', [App\Http\Controllers\GestorController::class, 'cadastroGestores'])->name('cadastroGestores');
    Route::get('/cadastroGestores/novo', [App\Http\Controllers\GestorController::class, 'cadastroNovoGestor'])->name('cadastroNovoGestor');
    Route::get('/cadastroGestores/alterar/{id}', [App\Http\Controllers\GestorController::class, 'alterarGestores'])->name('alterarGestores');
    Route::get('/cadastroGestores/excluir/{id}', [App\Http\Controllers\GestorController::class, 'excluirGestores'])->name('excluirGestores');
    Route::post('/cadastroGestores/novo', [App\Http\Controllers\GestorController::class, 'storeGestores'])->name('storeGestores');
    Route::post('/cadastroGestores/alterar/{id}', [App\Http\Controllers\GestorController::class, 'updateGestores'])->name('updateGestores');
    Route::post('/cadastroGestores/excluir/{id}', [App\Http\Controllers\GestorController::class, 'destroyGestores'])->name('destroyGestores');

});