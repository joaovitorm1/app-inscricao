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
class Requisito extends Model{

	use HasFactory, Notifiable;

	public $table = "requisito";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome',
		'quantidade',
		'pontos'
	];

	public function edital(){
		return $this->belongsTo(Edital::class);
	}

	public function candidatos(){
		return $this->belongsToMany(Candidato::class, 'requisito_candidato', 'requisito_id', 'candidato_id');
	}
	public function cargo(){
		return $this->belongsToMany(Cargo::class);
	}
}