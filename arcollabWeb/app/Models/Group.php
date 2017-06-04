<?php

namespace App\Models;

class Group extends \NeoEloquent {

    protected $label = 'Group';
    protected $fillable = ['name'];

    public function project()
    {
        return $this->morphTo();
    }

    public function items()
    {
        return $this->hasMany('Item', 'HAS_ITEM');
    }

    public function parentProject()
    {
        return $this->belongsTo('Project', 'HAS_GROUP');
    }

    public function parentGroup()
    {
        return $this->belongsTo('Group', 'HAS_GROUP');
    }
}

?>
