<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Models\Permissao;

/**
 *
 * @author Lucas Matos e Souza
 *        
 */
class GrupoUsuarios extends Model{

	use HasFactory, Notifiable;

	protected $table = "grupo-usuarios";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'nome',
		'descricao'
	];

	public function permissoes(){
		return $this->belongsToMany(Permissao::class, 'grupopermissoes', 'grupoUsuarios_id', 'permissao_id')
						->withPivot(['id']);
	}
}
