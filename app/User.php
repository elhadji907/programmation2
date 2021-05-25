<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User
 * 
 * @property int $id
 * @property string $uuid
 * @property string $civilite
 * @property string $firstname
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $telephone
 * @property string $fixe
 * @property string $sexe
 * @property \Carbon\Carbon $date_naissance
 * @property string $lieu_naissance
 * @property string $situation_familiale
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $created_by
 * @property string $updated_by
 * @property string $deleted_by
 * @property int $roles_id
 * @property string $adresse
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $administrateurs
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $comptables
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $gestionnaires
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 * @property \Illuminate\Database\Eloquent\Collection $postes
 * @property \Illuminate\Database\Eloquent\Collection $profiles
 *
 * @package App
 */
class User extends Authenticatable
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	use Notifiable;
	

	protected $casts = [
		'roles_id' => 'int'
	];

	protected $dates = [
		'date_naissance',
		'email_verified_at'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'uuid',
		'civilite',
		'firstname',
		'name',
		'username',
		'email',
		'telephone',
		'fixe',
		'sexe',
		'date_naissance',
		'lieu_naissance',
		'situation_familiale',
		'email_verified_at',
		'password',
		'created_by',
		'updated_by',
		'deleted_by',
		'roles_id',
		'adresse'
	];
	protected static function boot(){
		parent::boot();
		static::created(function ($user){
			$user->profile()->create([
				'titre'	=>	'',
				'description'	=>	'',
				'url'	=>	''
			]);
		});
	} 
	public function role()
	{
		return $this->belongsTo(\App\Role::class, 'roles_id');
	}

	public function administrateurs()
	{
		return $this->hasOne(\App\Administrateur::class, 'users_id');
	}

	public function beneficiaires()
	{
		return $this->hasOne(\App\Beneficiaire::class, 'users_id');
	}

	public function comments()
	{
		return $this->morphMany('\App\Comment', 'commentable')->latest();
	}

	public function comptables()
	{
		return $this->hasOne(\App\Comptable::class, 'users_id');
	}

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'users_id');
	}

	public function demandeurs()
	{
		return $this->hasOne(\App\Demandeur::class, 'users_id');
	}

	public function employees()
	{
		return $this->hasOne(\App\Employee::class, 'users_id');
	}

	public function gestionnaires()
	{
		return $this->hasOne(\App\Gestionnaire::class, 'users_id');
	}

	public function operateurs()
	{
		return $this->hasOne(\App\Operateur::class, 'users_id');
	}

	public function postes()
	{
		return $this->hasMany(\App\Poste::class, 'users_id');
	}

	public function profile()
	{
		return $this->hasOne(\App\Profile::class, 'users_id');
	}
	//gestion des roles
	public function hasRole($roleName)
	{
		return $this->role->name === $roleName;
	}	
	public function hasAnyRoles($roles)
	{
		return in_array($this->role->name, $roles);
	}	
	public function isAdmin(){
		return false;
	}
}
