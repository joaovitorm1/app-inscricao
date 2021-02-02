<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 *
 * @author Lucas Matos e Souza
 *        
 */
class Edital extends Model{

	use HasFactory, Notifiable;

	public $table = "edital";
	
	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'numero',
		'nome',
		'descricao',
		'responsavel',
		'dataInicial',
		'dataFinal',
		'link'
	];

	/*public function requisito(){
		return $this->hasOne(Requisito::class);
	}
	*/

	public function gruposOcupacionais(){
		return $this->belongsToMany(GrupoOcupacional::class);
	}
}

