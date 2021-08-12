<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'matricula',
        'gestor_id',
        'unidade_id',
        'created_at',
        'updated_at'
    ];
}
