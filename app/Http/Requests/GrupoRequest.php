<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
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
                    'grupo' => 'required|max:100'
                ];
                break;

            case "PUT": // atualização de registro
                return [
                    'grupo' => 'required|max:100'
                ];
                break;
            default:break;
        }
}
