<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest{
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
            'nome' => [
                'required',
                'max:100',
                ],
            ];

        //dd($validacao);

        return $validacao;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return [
            'nome.required' => 'É necessário preencher o campo NOME',

            'nome.max' => 'O CAMPO nome ultrapassou o tamanho máximo: 100 caracteres',
        ];
    }
}
