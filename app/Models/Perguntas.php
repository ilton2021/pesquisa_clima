<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    use HasFactory;

    protected $table = 'perguntas';

    protected $fillable = [
        'descricao',
        'categoria_id',
        'created_at',
        'updated_at'
    ];
}
