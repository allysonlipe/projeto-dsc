@extends('adminlte::page')

@section('title', 'Cadastro de Aluno')

@section('content_header')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('aluno.listagem')}}">Alunos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Novo</li>
        </ol>
    </nav>
@stop

@section('content')
    <form action="{{route('aluno.atualizar', ['id' => $objeto->id])}}" method="post">
        @method('PUT')
        @include('aluno-comum')
    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop