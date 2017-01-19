<?php 

namespace App\Models;

class Tag extends \NeoEloquent {

    protected $label = 'Tag';
    protected $fillable = ['name'];

    public function tags()
    {
        return $this->hasMany('Tag', 'HAS_TAG');
    }
    
    public function groups()
    {
        return $this->hasMany('Group', 'HAS_TAG');
    }
    
    public function items()
    {
        return $this->hasMany('Item', 'HAS_TAG');
    }
    
    public function parentProject()
    {
        return $this->belongsTo('Project', 'HAS_TAG');
    }
        
    public function parentTag()
    {
        return $this->belongsTo('Tag', 'HAS_TAG');
    }
}

?>