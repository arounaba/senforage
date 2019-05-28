<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 27 May 2019 20:24:09 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Consommation
 * 
 * @property int $id
 * @property string $uuid
 * @property \Carbon\Carbon $date
 * @property string $valeur
 * @property int $compteurs_id
 * @property int $factures_id
 * @property int $agents_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agent $agent
 * @property \App\Compteur $compteur
 * @property \App\Facture $facture
 *
 * @package App
 */
class Consommation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'compteurs_id' => 'int',
		'factures_id' => 'int',
		'agents_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'date',
		'valeur',
		'compteurs_id',
		'factures_id',
		'agents_id'
	];

	public function agent()
	{
		return $this->belongsTo(\App\Agent::class, 'agents_id');
	}

	public function compteur()
	{
		return $this->belongsTo(\App\Compteur::class, 'compteurs_id');
	}

	public function facture()
	{
		return $this->belongsTo(\App\Facture::class, 'factures_id');
	}
}
