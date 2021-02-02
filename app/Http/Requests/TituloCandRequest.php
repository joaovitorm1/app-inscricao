<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TituloCandRequest extends FormRequest{
    
    /**
     * Determine se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules(){
        $validacao = [
            'titulo_id' => [
                'required',
            ],
            'nome' => [
                'required',
            ],
            'data_conclusao' => [
                'required',
            ],
        ];

        return $validacao;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return [
            'nome'=>'ads',
        ];
    }
}
