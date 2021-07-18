<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'nome', 'email', 'data_nascimento', 'imagem_contato', 'nota'
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class);
    }

}


