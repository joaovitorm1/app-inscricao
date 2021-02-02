<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @author Lucas Matos e Souza
 *
 */
class Cargo extends Model{
	use HasFactory;

	protected $table = "cargo";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome',
		'cargaHoraria',
		'quantidade',
		'salario'
	];

	public function titulos(){
		return $this->belongsToMany(Titulo::class);
	}

	public function requisitos(){
		return $this->belongsToMany(Requisito::class);
	}

	public function edital(){
		return $this->belongsTo(Edital::class);
	}

	public function tipoCargo(){
		return $this->belongsTo(TipoCargo::class);
	}

	public function localCargo(){
		return $this->belongsTo(LocalCargo::class);
	}

	public function grupoOcupacional(){
		return $this->belongsTo(GrupoOcupacional::class);
	}
}