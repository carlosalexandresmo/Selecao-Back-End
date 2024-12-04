<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
    //Cadastrar um usuário
    Route::post('/register', [UserController::class, 'register']);

    //Autenticar um usuário
    Route::post('/login', [AuthController::class, 'login']);

    //Listar todos os comentários
    Route::get('/comments', [CommentController::class, 'index']);
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {
    //Atualizar um usuário
    Route::put('/update', [UserController::class, 'update']);

    //Visualizar dados e comentários de um usuário
    Route::get('/me', [UserController::class, 'show']);

    //Deslogar um usuário
    Route::post('/logout', [AuthController::class, 'logout']);
    
    //Listar comentários de usuário autenticado
    Route::get('/comments', [CommentController::class, 'index']);

    //Adicionar comentário de usuário autenticado
    Route::post('/comments', [CommentController::class, 'store']);

    //Editar comentário de usuário autenticado
    Route::put('/comments/{id}', [CommentController::class, 'update']);

    //Excluir comentário de usuário autenticado
    Route::delete('/comments/{id}', [CommentController::class, 'delete']);

    //Excluir todos os comentários como usuário administrador
    Route::delete('/comments', [CommentController::class, 'deleteAll']);

    //Visualizar histórico de um comentário
    Route::get('/comments/{id}/historics', [CommentController::class, 'history']);
    
});
