<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditalRequest extends FormRequest{
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
                'unique:edital,nome,'.$this->id
            ],
            'numero' => [
                'required'
            ],
            'descricao' => [
                'required'
            ],
            'responsavel' => [
                'required'
            ],
            'dataInicial' => [
                'date_format:Y-m-d', 
                'required', 
                'after:today'
            ],
            'dataFinal' => [
                'date_format:Y-m-d',
                'required',
                'after:today'
            ],
            'link' => [
                'required',
                'max:500',
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
            'nome.required' => 'É necessário preencher o campo NOME',
            'nome.unique' => 'O NOME já existe',
            'nome.max' => 'O campo NOME ultrapassou o tamanho máximo: 100 caracteres',

            'numero.required' => 'É necessário preencher o campo NÚMERO',

            'link.required' => 'É necessário preencher o campo LINK',
            'link.max' => 'O campo LINK ultrapassou o tamanho máximo: 500 caracteres',

            'descricao.required' => 'É necessário preencher o campo DESCRIÇÃO',

            'responsavel.required' => 'É necessário preencher o campo RESPONSÁVEL',

            'dataInicial.required' => 'É necessário preencher o campo DATA INICIAL',
            'dataInicial.date_format' => 'formato inválido DATA INICIAL',
            'dataInicial.after' => 'DATA INICIAL inválida',

            'dataFinal.required' => 'É necessário preencher o campo DATA FINAL',
            'dataFinal.date_format' => 'formato inválido DATA FINAL',
            'dataFinal.after' => 'DATA FINAL inválida'
        ];
    }
}
