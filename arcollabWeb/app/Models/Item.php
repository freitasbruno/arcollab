<?php 

namespace App\Models;

class Item extends \NeoEloquent {

    protected $label = 'Item';
    protected $fillable = ['title', 'description', 'status'];
    
    public function comments()
    {
        return $this->hasMany('Comment', 'HAS_COMMENT');
    }
}

?>