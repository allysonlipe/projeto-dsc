@extends('adminlte::page')

@section('title', 'Cadastro de Curso')

@section('content_header')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Novo</li>
        </ol>
    </nav>
@stop

@section('content')
    <form action="{{route('curso.atualizar', ['id' => $objeto->id])}}" method="post">
        @method('PUT')
        @include('curso-comum')
    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop