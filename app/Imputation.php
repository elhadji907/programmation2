<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Imputation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $destinataire
 * @property string $sigle
 * @property \Carbon\Carbon $date
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cellules
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $directions
 * @property \Illuminate\Database\Eloquent\Collection $services
 *
 * @package App
 */
class Imputation extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'destinataire',
		'sigle',
		'date'
	];

	public function cellules()
	{
		return $this->hasMany(\App\Cellule::class, 'imputations_id');
	}

	public function courriers()
	{
		return $this->belongsToMany(\App\Courrier::class, 'courriers_has_imputations', 'imputations_id', 'courriers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function directions()
	{
		return $this->hasMany(\App\Direction::class, 'imputations_id');
	}

	public function services()
	{
		return $this->hasMany(\App\Service::class, 'imputations_id');
	}
}
