<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cursos';
    protected $guarded = ['id'];

    protected $fillable = ['nome'];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_curso');
    }
    
}
