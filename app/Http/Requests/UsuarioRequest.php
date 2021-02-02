<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest{
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
            'login' => [
                'required',
                'max:100',
                'unique:usuario,login,'.$this->id],
            'senha' => ['sometimes','required'],
            'grupo' => ['exists:grupousuarios,id']
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
            'login.required' => 'É necessário preencher o campo LOGIN',
            'senha.required' => 'É necessário preencher o campo SENHA',
            'grupo.min' => 'É necessário selecionar o Grupo de Usuário',
            'grupo.exists' => 'É necessário selecionar o Grupo de Usuário',

            'login.unique' => 'O LOGIN já existe',

            'nome.max' => 'O campo LOGIN ultrapassou o tamanho máximo: 100 caracteres',
        ];
    }
}
