<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 *
 * @author joão Vitor S. Rocha
 *
 */
class Endereco extends Model{
	use HasFactory, Notifiable;

	protected $table = "endereco";

	public $timestamps = false;
	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'cep',
		'logradouro',
		'endereco',
		'numero',
		'complemento',
		'cidade',
		'bairro',
		'estado',
	];
	
	public function candidato(){
		return $this->belongsTo(Candidato::class);
	}

}

