<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 *
 * @author João Vitor S. Rocha
 *
 */
class Candidato extends Model{
	use HasFactory, Notifiable;

	protected $table = "candidato";

	public $timestamps = false;
	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome',
		'cpf',
		'tipodoc_id',
		'numerodoc',
		'orgao_expedidor',
		'telefone',
		'edital',
		//'cargo_id',
		'data_nascimento',
		'inscricao',
		
	];

	public function endereco(){
		return $this->belongsTo(Endereco::class);
	}
	public function Cargo_id(){
		return $this->belongsTo(Cargo::class);
	}
	public function local(){
		return $this->hasmanyThrough(Local::class,Candidato::class);
	}
	public function edital(){
		return $this->hasOne(edital::class);
	}

	public function requisitos(){
		return $this->belongsToMany(Requisito::class, 'requisito_candidato', 'candidato_id', 'requisito_id')
						->withPivot(['id']);
	}
	public function tituloCandidatos(){
		return $this->hasMany(TituloCandidato::class);
	}
}