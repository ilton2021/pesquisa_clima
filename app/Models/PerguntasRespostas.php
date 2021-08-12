<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerguntasRespostas extends Model
{
    use HasFactory;

    protected $table = 'perguntas_respostas';

    protected $fillable = [
        'perguntas_id',
        'respostas_id',
        'unidade_id',
        'gestor_id',
        'usuario_id',
        'comentario',
        'categoria_id',
        'created_at',
        'updated_at'
    ];
}
