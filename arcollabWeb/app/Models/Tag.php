<?php

namespace App\Models;

class Tag extends \NeoEloquent {

    protected $label = 'Tag';
    protected $fillable = ['name'];

    public function groups()
    {
        return $this->hasMany('Group', 'HAS_TAG');
    }

    public function items()
    {
        return $this->hasMany('Item', 'HAS_TAG');
    }

    public function tagCategory()
    {
        return $this->belongsTo('TagCategory', 'HAS_TAG');
    }
}

?>
