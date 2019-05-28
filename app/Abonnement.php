<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 27 May 2019 20:24:09 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Abonnement
 * 
 * @property int $id
 * @property string $uuid
 * @property string $details
 * @property int $clients_id
 * @property int $compteurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Client $client
 * @property \App\Compteur $compteur
 *
 * @package App
 */
class Abonnement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'clients_id' => 'int',
		'compteurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'details',
		'clients_id',
		'compteurs_id'
	];

	public function client()
	{
		return $this->belongsTo(\App\Client::class, 'clients_id');
	}

	public function compteur()
	{
		return $this->belongsTo(\App\Compteur::class, 'compteurs_id');
	}
}
