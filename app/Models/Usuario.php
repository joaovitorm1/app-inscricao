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
class Usuario extends Model{

	use HasFactory, Notifiable;

	protected $table = "usuario";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'login',
		'senha'
	];

	public function grupos(){
		return $this->belongsToMany(GrupoUsuarios::class, 'usuario_grupousuarios', 'usuario_id', 'grupoUsuarios_id');
	}

}