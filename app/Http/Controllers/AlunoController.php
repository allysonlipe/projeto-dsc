<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Http\Requests\AlunoRequest;

class AlunoController extends Controller
{
    //

        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Aluno::all();
        
        return view('aluno-listagem', [
            'objetos' => $dados
        ]);
    }

    public function create()
    {
        return view('aluno-cadastro');
    }
    
    public function store(AlunoRequest $request)
    {
        $dados_formulario = $request->validated();
        
        $retorno = Aluno::create($dados_formulario);
        
        if($retorno){
            return redirect()->route('aluno.listagem');
        }
    }
    
    public function edit(string $id)
    {
        $dado = Aluno::find($id);

        if($dado){
            return view('aluno-alterar', 
                        ['objeto' => $dado]
                    );
        }else{
            return redirect()->back();
        }
    }

    public function update(AlunoRequest $request, string $id)
    {
      
        $dados_formulario = $request->validated();
        $registro_recuperado = Aluno::find($id);

        if($registro_recuperado){
            $registro_recuperado->update($dados_formulario);
            return redirect()->route('aluno.listagem');
    
        }else{
            return redirect()->back();
        }
    }



    public function destroy(string $id)
    {
        $registro_recuperado = Aluno::find($id);

        if($registro_recuperado){
            $registro_recuperado->delete();
            return redirect()->route('aluno.listagem');
        }else{

            return redirect()->back();
        }
    }

}