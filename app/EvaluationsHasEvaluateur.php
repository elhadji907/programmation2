<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Apr 2021 18:20:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EvaluationsHasEvaluateur
 * 
 * @property int $evaluations_id
 * @property int $evaluateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Evaluateur $evaluateur
 * @property \App\Evaluation $evaluation
 *
 * @package App
 */
class EvaluationsHasEvaluateur extends Eloquent
{	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $primaryKey = 'evaluations_id';

	protected $casts = [
		'evaluateurs_id' => 'int'
	];

	protected $fillable = [
		'evaluateurs_id'
	];

	public function evaluateur()
	{
		return $this->belongsTo(\App\Evaluateur::class, 'evaluateurs_id');
	}

	public function evaluation()
	{
		return $this->belongsTo(\App\Evaluation::class, 'evaluations_id');
	}
}
