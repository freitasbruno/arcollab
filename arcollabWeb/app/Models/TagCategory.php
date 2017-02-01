<?php

namespace App\Models;

class TagCategory extends \NeoEloquent {

    protected $label = 'TagCategory';
    protected $fillable = ['name'];

    public function tags()
    {
        return $this->hasMany('Tag', 'HAS_TAG');
    }

    public function parentProject()
    {
        return $this->belongsTo('Project', 'HAS_TAG');
    }
}

?>
