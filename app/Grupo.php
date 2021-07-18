<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'grupo'
    ];

    public function contatos()
    {
        return $this->belongsToMany(Contato::class);
    }
}
