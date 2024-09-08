<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    private $rules;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nome' => 'required|min:2|max:60|unique:alunos,nome',
            'email' => 'required|email|min:2|max:255|unique:alunos,email',
        ];

        // Se for uma atualização (PUT ou PATCH)
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Obtenha o ID do aluno da rota para ignorar a verificação de exclusividade do próprio registro
            $id = $this->route('id'); 

            $rules['nome'] = "required|min:2|max:60|unique:alunos,nome,$id";
            $rules['email'] = "required|email|min:2|max:255|unique:alunos,email,$id";
        }

        return $rules;
    }
}
