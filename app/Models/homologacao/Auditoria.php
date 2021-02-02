<?php

namespace App\Models\homologacao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 *
 * @author Lucas Matos e Souza
 *
 */
class Auditoria extends Model{

	use HasFactory, Notifiable;

	// Definimos a conexão "homologacao" para este model
	protected $connection = 'homologacao';

	protected $table = "auditoria";

	public $timestamps = false;

	/**
	 * Atributos da Classe
	 */
	protected $fillable  = [
		'ip',
		'nome_maquina',
		'data_acesso',
		'registro'
	];

}