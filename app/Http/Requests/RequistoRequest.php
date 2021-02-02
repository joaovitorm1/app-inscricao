<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequistoRequest extends FormRequest{
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
                'unique:requisito,nome,'.$this->id],
                //Rule::unique('requisito', 'id')->ignore($this->id, 'nome')],
            'quantidade' => [ 'required', 'numeric'],
            'pontos' => [ 'required', 'numeric'],
            'edital' => ['required']
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
            'nome.required' => 'É necessário preencher o campo NOME',
            'nome.unique' => 'O Campo NOME já existe',
            'nome.max' => 'O CAMPO nome ultrapassou o tamanho máximo: 100 caracteres',

            'pontos.numeric' => 'QUANTIDADE é um número',
            'pontos.required' => 'É necessário preencher o campo PONTOS',

            'edital.required' => 'É necessário selecionar o campo EDITAL',

            'quantidade.numeric' => 'QUANTIDADE é um número',
            'quantidade.required' => 'É necessário preencher o campo QUANTIDADE',            
        ];
    }
}
