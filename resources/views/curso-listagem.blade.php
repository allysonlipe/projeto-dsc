@extends('adminlte::page')

@section('title', 'Listagem de Cursos')

@section('content_header')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item py-2">Cursos</li>
        </ol>
    </nav>
    
    <a href="{{ route('curso.cadastro') }}" class="btn btn-secondary">Novo Cadastro</a>
    
@stop


@section('content')

    <div class="card">
    <div class="card-header">
        Listagem de Cursos
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th colspan="2" class="text-center" >Ações</th>
            </tr>

            @forelse($objetos as $objeto)
            <tr>
                <td> {{ $objeto['id'] }} </td>
                <td> {{ $objeto['nome'] }} </td>
                <td class="text-center"> <a href="{{ route('curso.alterar', ['id' => $objeto['id']] ) }}">Alterar</a> </td>
                <td class="text-center"> <a href="{{ route('curso.deletar', ['id' => $objeto['id']] ) }}">Deletar</a> </td>
            </tr>
            @empty
            <tr>
                <td> Sem Dados no Banco de Dados </td>
            </tr>
            @endforelse
        </table>
    </div>
    <div class="card-footer text-body-secondary">
        Link Paginação
    </div>
    </div>
    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop