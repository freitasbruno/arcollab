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

    public function parentProject()
    {
        return $this->belongsTo('Project', 'ASSIGNED_TO_TEAM');
    }

    public function parentTeam()
    {
        return $this->belongsTo('Team', 'HAS_TEAM');
    }
}

?>
