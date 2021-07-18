<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [
        'contato_id', 'telefone'
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
