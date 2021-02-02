<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest{
    
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
                'unique:cargo,nome,'.$this->id],
            'quantidade' => [ 'required'],
            'cargaHoraria' => [ 'required'],
            'salario' => [ 'required'],
            'grupoOcupacional' => [ 'required', 'exists:App\Models\GrupoOcupacional,id'],
            'localCargo' => [ 'required', 'exists:App\Models\LocalCargo,id'],
            'tipoCargo' => [ 'required', 'exists:App\Models\TipoCargo,id']
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
            'cargaHoraria.required' => 'É necessário preencher o campo CARGA HORÁRIA',
            'salario.required' => 'É necessário preencher o campo SALÁRIO',
            'grupo.required' => 'É necessário preencher o campo GRUPO',

            'nome.unique' => 'O Campo NOME já existe',

            'nome.max' => 'O CAMPO nome ultrapassou o tamanho máximo: 100 caracteres',
        ];
    }
}
