<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPassword;
use NeoEloquent;

class User extends NeoEloquent implements Authenticatable, CanResetPassword
{

	protected $label = 'User';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->hasMany('Project', 'CREATED_PROJECT');
    }

    public function teams()
    {
        return $this->hasMany('Team', 'CREATED_TEAM');
    }

    public function assignedTeams()
    {
        return $this->belongsToMany('Team', 'HAS_USER');
    }

	public function projectGroups($morph = null)
	{
		return $this->hyperMorph($morph, 'Group', 'HAS_GROUP', 'ON');
	}

	/**
     * This set of functions relate to the Authenticatable Contract
     *
     */
    public function getAuthIdentifierName()
	{
	    return $this->email;
	}

    public function getAuthIdentifier()
	{
	    return $this->id;
	}

	public function getAuthPassword()
	{
	    return $this->password;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($token)
	{
	    $this->remember_token = $token;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	public function getEmailForPasswordReset()
	{
	    return $this->email;
	}

	public function sendPasswordResetNotification($token)
	{
	    //$this->notify(new ResetPasswordNotification($token));
	    return null;
	}
}
