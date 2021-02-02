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
class LocalCargo extends Model{

	use HasFactory, Notifiable;

	public $table = "local-cargo";

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
