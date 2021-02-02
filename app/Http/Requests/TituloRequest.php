<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TituloRequest extends FormRequest{
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
                Rule::unique('titulo', 'id')->ignore($this->id, 'nome')],
            'quantidade' => [
                    'required',
                    'numeric'],
            'pontos' => [
                    'required',
                    'numeric']
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
            'quantidade.required' => 'É necessário preencher o campo QUANTIDADE',
            'pontos.required' => 'É necessário preencher o campo PONTOS',

            'nome.unique' => 'O Campo NOME já existe',
            'quantidade.required' => 'QUANTIDADE é um número',
            'pontos.required' => 'QUANTIDADE é um número',

            'nome.max' => 'O CAMPO nome ultrapassou o tamanho máximo: 100 caracteres',
        ];
    }
}
