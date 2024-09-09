@extends('adminlte::page')

@section('title', 'Listagem de Alunos')

@section('content_header')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item py-2">Alunos</li>
        </ol>
    </nav>
    
    <a href="{{ route('aluno.cadastro') }}" class="btn btn-secondary">Novo Aluno</a>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        Listagem de Alunos
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th colspan="2" class="text-center">Ações</th>
            </tr>
        
            @forelse($objetos as $objeto)
                <tr>
                    <td>{{ $objeto->id }}</td>
                    <td>{{ $objeto->nome }}</td>
                    <td>{{ $objeto->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('aluno.alterar', ['id' => $objeto->id]) }}" class="btn btn-primary">Alterar</a>
                    </td>
                    <td class="text-center">
                        <!-- Botão para abrir o modal de exclusão -->
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $objeto->id }}" data-nome="{{ $objeto->nome }}">
                            Deletar
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Sem Dados no Banco de Dados</td>
                </tr>
            @endforelse
        </table>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Você realmente deseja excluir o aluno <strong id="alunoNome"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="text-center btn btn-danger" id="confirmDelete" href="#">Deletar</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        // Script para manipular o modal de confirmação de exclusão
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botão que abriu o modal
            var alunoId = button.data('id'); // Extraímos o ID do botão
            var alunoNome = button.data('nome'); // Extraímos o nome do botão

            // Atualiza o texto do modal com o nome do aluno
            var modal = $(this);
            modal.find('#alunoNome').text(alunoNome);

            // Atualiza o link de exclusão com o ID do aluno
            modal.find('#confirmDelete').attr('href', "{{ route('aluno.deletar', '') }}/" + alunoId);
        });
    </script>
@stop
