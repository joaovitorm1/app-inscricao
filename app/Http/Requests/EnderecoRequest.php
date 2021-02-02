<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest{
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
            'cep' => [
                'required',
                'max:50',
                ],
            'logradouro' => [
                'required',
            ],
            'endereco' => [
                'required',
            ],
            'numero' => [
                'required',
            ],
            'complemento' => [
                'max:100',
            ],
            'cidade' => [
                'required',
                'max:100',
            ],
            'bairro' => [
                'required',
                'max:50',
            ],
            'estado' => [
                'required',
                'max:50',
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

            'nome.unique' => 'O Campo NOME já existe',

            'nome.max' => 'O CAMPO nome ultrapassou o tamanho máximo: 100 caracteres',
        ];
    }
}
