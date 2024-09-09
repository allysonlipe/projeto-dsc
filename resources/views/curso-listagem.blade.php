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
                <th colspan="2" class="text-center">Ações</th>
            </tr>

            @forelse($objetos as $objeto)
            <tr>
                <td>{{ $objeto['id'] }}</td>
                <td>{{ $objeto['nome'] }}</td>
                <td class="text-center">
                    <a class="btn btn-primary" href="{{ route('curso.alterar', ['id' => $objeto['id']] ) }}">Alterar</a>
                </td>
                <td class="text-center">
                    <!-- Botão que abre o modal -->
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $objeto['id'] }}" data-nome="{{ $objeto['nome'] }}">Deletar</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Sem Dados no Banco de Dados</td>
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
            Você realmente deseja excluir o curso <strong id="cursoNome"></strong>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a class="text-center btn btn-danger" href="{{ isset($objeto) ? route('curso.deletar', ['id' => $objeto->id] ) : '#' }}">Deletar</a>
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
        // Script para abrir o modal com o nome e ID corretos
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botão que acionou o modal
            var id = button.data('id') // Extraindo informações dos atributos data-*
            var nome = button.data('nome') 

            var modal = $(this)
            modal.find('#cursoNome').text(nome) // Atualiza o nome no modal
            modal.find('#deleteForm').attr('action', '/curso/deletar/' + id) // Atualiza a ação do formulário
        })
    </script>
@stop
