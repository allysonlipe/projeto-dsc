<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlunoController;

Route::redirect('/', '/login');

Route::middleware('auth')->group(function(){ 

    Route::get('/curso-listagem', [ CursoController::class, 'index' ])
    ->middleware('permission:curso_listar')
    ->name('curso.listagem');

    Route::get('/curso-cadastro', [ CursoController::class, 'create' ])
    ->middleware('permission:curso_cadastrar')
    ->name('curso.cadastro');

    Route::post('/curso-salvar',  [ CursoController::class, 'store' ])
    ->middleware('permission:curso_cadastrar')
    ->name('curso.salvar');

    Route::get('/curso-alterar/{id}',  [ CursoController::class, 'edit' ])
    ->middleware('permission:curso_alterar')
    ->name('curso.alterar');

    Route::put('/curso-atualizar/{id}',  [ CursoController::class, 'update' ])
    ->middleware('permission:curso_alterar')
    ->name('curso.atualizar');

    Route::get('/curso-deletar/{id}',  [ CursoController::class, 'destroy' ])
    ->middleware('permission:curso_deletar')
    ->name('curso.deletar');

    Route::get('/aluno-listagem', [ AlunoController::class, 'index' ])
    ->middleware('permission:curso_listar')
    ->name('aluno.listagem');

    Route::get('/aluno-cadastro', [ AlunoController::class, 'create' ])
    ->middleware('permission:curso_cadastrar')
    ->name('aluno.cadastro');

    Route::post('/aluno-salvar',  [ AlunoController::class, 'store' ])
    ->middleware('permission:curso_cadastrar')
    ->name('aluno.salvar');

    Route::get('/aluno-alterar/{id}',  [ AlunoController::class, 'edit' ])
    ->middleware('permission:curso_alterar')
    ->name('aluno.alterar');

    Route::put('/aluno-atualizar/{id}',  [ AlunoController::class, 'update' ])
    ->middleware('permission:curso_alterar')
    ->name('aluno.atualizar');

    Route::get('/aluno-deletar/{id}',  [ AlunoController::class, 'destroy' ])
    ->middleware('permission:curso_deletar')
    ->name('aluno.deletar');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
