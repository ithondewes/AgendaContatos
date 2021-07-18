<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case "POST": // criação de registro
                return [
                    'nome' => 'required|max:100',
                    'email' => 'email|max:200|unique:contatos',
                    'data_nascimento' => 'date_format:"d/m/Y"',
                    'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,gif'
                ];
                break;

            case "PUT": // atualização de registro
                return [
                    'nome' => 'required|max:100',
                    'email' => 'email|max:200|unique:contatos,email,'.$this->id,
                    'data_nascimento' => 'date_format:"d/m/Y"',
                    'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,gif'
                ];
                break;
            default:break;
        }
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório',
            'email.email' => 'Informe um e-mail válido',
            'data_nascimento.date_format' => 'O campo data deve ser no formato DD/MM/AAAA'
        ];
    }

}
