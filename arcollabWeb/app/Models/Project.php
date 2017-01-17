<?php 

namespace App\Models;

class Project extends \NeoEloquent {

    protected $label = 'Project';
    protected $fillable = ['name', 'description', 'location'];
    
    public function groups()
    {
        return $this->hasMany('Group', 'HAS_GROUP');
    }
    
    public function teams()
    {
        return $this->hasMany('Team', 'ASSIGNED_TO_TEAM');
    }

}

?>