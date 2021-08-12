<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respostas extends Model
{
    use HasFactory;

    protected $table = 'respostas';

    protected $fillable = [
        'descricao',
        'created_at',
        'updated_at'
    ];
}
