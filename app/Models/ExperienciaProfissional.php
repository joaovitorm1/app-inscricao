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
class ExperienciaProfissional extends Model{

	use HasFactory, Notifiable;

	protected $table = "experiencia-profissional";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome'
	];

	public function candidato(){
		return $this->belongsTo(Candidato::class);
	}
}
