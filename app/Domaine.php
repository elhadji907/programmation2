<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Domaine
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $secteurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Secteur $secteur
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Domaine extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'secteurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'secteurs_id'
	];

	public function secteur()
	{
		return $this->belongsTo(\App\Secteur::class, 'secteurs_id');
	}

	public function modules()
	{
		return $this->hasMany(\App\Module::class, 'domaines_id');
	}
}
