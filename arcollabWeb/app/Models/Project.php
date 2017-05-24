<?php

namespace App\Models;

class Project extends \NeoEloquent {

    protected $label = 'Project';
    protected $fillable = ['name', 'description', 'location'];

    public function groups()
    {
        return $this->hasMany('Group', 'HAS_GROUP');
    }

    public function items()
    {
        return $this->hasMany('Item', 'HAS_ITEM');
    }

    public function teams()
    {
        return $this->hasMany('Team', 'ASSIGNED_TO_TEAM');
    }

    public function tags()
    {
        return $this->hasMany('Tag', 'HAS_TAG');
    }

}

?>
