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
class Titulo extends Model{

	use HasFactory, Notifiable;

	public $table = "titulo";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome',
		'quantidade',
		'pontos',
		'qtd_max'
	];

	public function edital(){
		return $this->belongsTo(Edital::class);
	}

	public function tituloCandidatos(){
		return $this->hasMany(TituloCandidato::class);
	}
	public function tituloCandidato(){
		return $this->belongsTo(TituloCandidato::class);
	}
	
}
