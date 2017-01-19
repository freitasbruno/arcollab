<?php 

namespace App\Models;

class Item extends \NeoEloquent {

    protected $label = 'Item';
    protected $fillable = ['title', 'description', 'status'];
    
    public function comments()
    {
        return $this->hasMany('Comment', 'HAS_COMMENT');
    }
    
    public function tags()
    {
        return $this->hasMany('Tag', 'HAS_TAG');
    }
    
    public function teams()
    {
        return $this->hasMany('Team', 'ASSIGNED_TO_TEAM');
    }
    
    public function parentGroup()
    {
        return $this->belongsTo('Group', 'HAS_ITEM');
    }
}

?>