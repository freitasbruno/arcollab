<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \NeoEloquent
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
    
    public function hasProject()
    {
        return $this->hasMany('Project', 'CREATED_PROJECT');
    }
}
