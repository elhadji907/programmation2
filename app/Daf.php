<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Apr 2021 12:27:11 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Daf
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $name
 * @property string $description
 * @property string $designation
 * @property \Carbon\Carbon $date_visa
 * @property \Carbon\Carbon $date_mandat
 * @property \Carbon\Carbon $date_ac
 * @property string $tva_ir
 * @property string $rejet
 * @property \Carbon\Carbon $date_cg
 * @property string $retour
 * @property string $paye
 * @property string $observation
 * @property string $nb_pc
 * @property string $destinataire
 * @property \Carbon\Carbon $date_paye
 * @property string $num_bord
 * @property float $montant
 * @property float $total
 * @property float $autres_montant
 * @property int $courriers_id
 * @property int $projets_id
 * @property int $imputations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Imputation $imputation
 * @property \App\Projet $projet
 *
 * @package App
 */
class Daf extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'montant' => 'float',
		'total' => 'float',
		'autres_montant' => 'float',
		'courriers_id' => 'int',
		'projets_id' => 'int',
		'imputations_id' => 'int'
	];

	protected $dates = [
		'date_visa',
		'date_mandat',
		'date_ac',
		'date_cg',
		'date_paye'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'description',
		'designation',
		'date_visa',
		'date_mandat',
		'date_ac',
		'tva_ir',
		'rejet',
		'date_cg',
		'retour',
		'paye',
		'observation',
		'nb_pc',
		'destinataire',
		'date_paye',
		'num_bord',
		'montant',
		'total',
		'autres_montant',
		'courriers_id',
		'projets_id',
		'imputations_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function imputation()
	{
		return $this->belongsTo(\App\Imputation::class, 'imputations_id');
	}

	public function projet()
	{
		return $this->belongsTo(\App\Projet::class, 'projets_id');
	}
}
