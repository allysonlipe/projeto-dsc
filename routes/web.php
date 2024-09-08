<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

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

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
