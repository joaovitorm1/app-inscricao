<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GrupoUsuariosRequest extends FormRequest{
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
                    'unique:grupousuarios,nome,'.$this->id
                ],
                'descricao' => [
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

            'nome.unique' => 'O campo NOME já existe',

            'nome.max' => 'O campo NOME ultrapassou o tamanho máximo: 100 caracteres',
            'descricao.max' => 'O campo DESCRIÇÃO ultrapassou o tamanho máximo: 100 caracteres',
        ];
    }
}
