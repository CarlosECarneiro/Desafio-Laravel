<?php
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

//Rota para a tela inicial.
Route::get('/',[ClienteController::class,'welcome']);

//Rota para a pesquisa.
Route::get('/pesquisar',[ClienteController::class,'search']);

//Rota para o formulário de cadastro.
Route::get('/cadastrar', [ClienteController::class,'create']);

//Rota para envio dos dados do formulário de cadastro.
Route::post('/cadastrar-cliente', [ClienteController::class,'store']);

//Rota para a visualização individual de cliente.
Route::get('/visualizar-cliente/{id}', [ClienteController::class,'read']);

//Rota para o formulário de edição.
Route::get('/atualizar/{id}', [ClienteController::class,'edit']);

//Rota para envio dos dados do formulário de edição.
Route::put('/atualizar-cliente/{id}', [ClienteController::class,'update']);

//Rota para excluir o cadastro.
Route::get('/excluir-cliente/{id}',[ClienteController::class,'delete']);