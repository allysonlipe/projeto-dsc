<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Http\Requests\CursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Curso::all();
        
        return view('curso-listagem', [
            'objetos' => $dados
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curso-cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRequest $request)
    {
        $dados_formulario = $request->validated();

        $retorno = Curso::create($dados_formulario);

        if($retorno){
            return redirect()->route('curso.listagem');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Curso::find($id);

        if($dado){
            return view('curso-alterar', 
                        ['objeto' => $dado]
                    );
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, string $id)
    {
      
        $dados_formulario = $request->validated();
        $registro_recuperado = Curso::find($id);

        if($registro_recuperado){
            $registro_recuperado->update($dados_formulario);
            return redirect()->route('curso.listagem');
    
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro_recuperado = Curso::find($id);

        if($registro_recuperado){
            $registro_recuperado->delete();
            return redirect()->route('curso.listagem');
        }else{

            return redirect()->back();
        }
    }
}
