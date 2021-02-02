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
class GrupoOcupacional extends Model{

	use HasFactory, Notifiable;

	protected $table = "grupo-ocupacional";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome'
	];

	public function edital(){
		return $this->belongsTo(Edital::class);
	}
}
