<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Models\GrupoUsuario;

/**
 *
 * @author Lucas Matos e Souza
 *
 */
class RequisitoCandidato extends Model{

	use HasFactory, Notifiable;

	public $table = "requisito_candidato";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'requisito_id',
		'candidato_id'
	];

	public function Requisito(){
		return $this->belongsToMany(Requisito::class);
	 }
	 public function Candidato(){
		return $this->belongsToMany(Candidato::class);
 	}
}
