<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'nome', 'telefone', 'email', 'data_nascimento', 'imagem_contato', 'nota'
    ];
}
