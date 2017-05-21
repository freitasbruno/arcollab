<?php

namespace App\Models;

class Tag extends \NeoEloquent {

    protected $label = 'Tag';
    protected $fillable = ['name'];

    public function projects()
    {
        return $this->hasMany('Project', 'HAS_TAG');
    }

    public function items()
    {
        return $this->hasMany('Item', 'HAS_TAG');
    }

    public function tags()
    {
        return $this->hasMany('Tag', 'HAS_TAG');
    }
}

?>
