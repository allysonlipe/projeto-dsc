<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email'];
    protected $guarded = ['id'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'aluno_curso');
    }
}


