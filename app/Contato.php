<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'user_id', 'grupo_id', 'nome', 'email', 'data_nascimento', 'avatar', 'nota'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
        return $this->belongsTo(Grupo::class);
    }

    // Accessor
    public function getAvatarImageAttribute($value) {
        return $this->avatar == null ? asset('images/null.jpg') : asset($this->avatar);
    }
    public function getAvatarFilenameAttribute($value) {
        return substr($this->avatar, 30, strlen($this->avatar));
    }
    public function getDataNascimentoAttribute($value) {
        return dateFormatDatabaseScreen($value, 'screen');
    }

    // Mutator
    public function setDataNascimentoAttribute($value) {
        $this->attributes['data_nascimento'] = dateFormatDatabaseScreen($value);
    }
    public function setAvatarAttribute($value) {
        $filename = substr(md5(rand(100000, 999999)),0,5) .'_'. $value->getClientOriginalName();
        $filepath = 'public/uploads/'.date('Y').'/'.date('m').'/';
        if ($value->isValid()) {
            $path = $value->storeAs($filepath, $filename);
        }
        $this->attributes['avatar'] = str_replace('public', 'storage', $filepath) . $filename;
    }

    public function search($filter = null) {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('nome', 'LIKE', "%{$filter}%");
            }
        })//->tosql();
        ->paginate();

        return $results;
                        
    }

    

}


