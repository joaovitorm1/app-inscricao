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
class CargoRequisito extends Model{

	use HasFactory, Notifiable;

	public $table = "cargo_requisito";

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
}