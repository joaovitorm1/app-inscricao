<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @author Lucas Matos e Souza
 *
 */
class TituloCandidato extends Model{
	use HasFactory;

	protected $table = "titulo_candidato";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome',
		'dataConclusao'
	];

	public function titulo(){
		return $this->belongsTo(Candidato::class,'titulo_id','id')->withDefault();
	}

	public function candidato(){
		return $this->belongsTo(Candidato::class);
	}
}