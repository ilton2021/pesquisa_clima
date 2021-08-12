<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestor extends Model
{
    use HasFactory;

    protected $table = 'gestor';

    protected $fillable = [
        'nome',
        'perfil',
        'unidade_id',
        'created_at',
        'updated_at'
    ];
}
