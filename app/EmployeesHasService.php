<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EmployeesHasService
 * 
 * @property int $employees_id
 * @property int $services_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 * @property \App\Service $service
 *
 * @package App
 */
class EmployeesHasService extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'employees_id';

	protected $casts = [
		'services_id' => 'int'
	];

	protected $fillable = [
		'services_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}

	public function service()
	{
		return $this->belongsTo(\App\Service::class, 'services_id');
	}
}
