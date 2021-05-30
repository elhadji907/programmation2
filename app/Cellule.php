<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 00:52:47 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Cellule
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $courriers_id
 * @property int $imputations_id
 * @property int $employees_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Employee $employee
 * @property \App\Imputation $imputation
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App
 */
class Cellule extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'courriers_id' => 'int',
		'imputations_id' => 'int',
		'employees_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'courriers_id',
		'imputations_id',
		'employees_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}

	public function imputation()
	{
		return $this->belongsTo(\App\Imputation::class, 'imputations_id');
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'cellules_has_employees', 'cellules_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
