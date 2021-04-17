<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Detf
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $titre1
 * @property string $titre2
 * @property \Carbon\Carbon $date1
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Detf extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'titre1',
		'titre2',
		'date1'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'detfs_id');
	}
}
