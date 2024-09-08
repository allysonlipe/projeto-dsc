<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
        $this->rules = [
            'nome' => 'required|min:2|max:60|unique:cursos'
        ];

        if($this->method() == 'PUT' || $this->method() == 'PATCH'){
            unset($this->rules['nome']);
            $this->rules = [
                'nome' => "required|min:2|max:60|unique:cursos,nome,{$this->route('id')}"
            ];
        }

        return $this->rules;
    }
}
