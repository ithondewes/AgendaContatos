<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
                    'CEP' => 'required|max:8',
                    'logradouro' => 'required|max:200',
                    'numero' => 'required|max:10',
                    'bairro' => 'required|max:100',
                    'complemento' => 'required|max:100',
                    'cidade' => 'required|max:100',
                    'uf' => 'required|max:50',
                ];
                break;

            case "PUT": // atualização de registro
                return [
                    'CEP' => 'required|max:8',
                    'logradouro' => 'required|max:200',
                    'numero' => 'required|max:10',
                    'bairro' => 'required|max:100',
                    'complemento' => 'required|max:100',
                    'cidade' => 'required|max:100',
                    'uf' => 'required|max:50',
                ];
                break;
            default:break;
        }
    }
}
