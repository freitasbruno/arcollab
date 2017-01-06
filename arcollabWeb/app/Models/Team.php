<?php 

namespace App\Models;

class Team extends \NeoEloquent {

    protected $label = 'Team';
    protected $fillable = ['name', 'description', 'location'];
    
    public function users()
    {
        return $this->hasMany('User', 'HAS_USER');
    }
    
    public function teams()
    {
        return $this->hasMany('Team', 'HAS_TEAM');
    }
}

?>