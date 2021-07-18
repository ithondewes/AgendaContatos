<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'contato_id', 'CEP', 'logradouro', 'numero', 'bairro', 'complemento', 'cidade', 'uf'
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
