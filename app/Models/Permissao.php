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
class Permissao extends Model{

	use HasFactory, Notifiable;

	public $table = "permissao";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome',
		'descricao'
	];

	public function grupos(){
		return $this->belongsToMany(GrupoUsuario::class, 'grupo_permissao','permissao','grupo');
 	}
}
