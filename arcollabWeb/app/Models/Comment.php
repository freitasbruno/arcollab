<?php 

namespace App\Models;

class Comment extends \NeoEloquent {

    protected $label = 'Comment';
    protected $fillable = ['description'];

    public function comments()
    {
        return $this->hasMany('Comment', 'HAS_COMMENT');
    }
    
    public function attachements()
    {
        return $this->hasMany('Attachement', 'HAS_ATTACHEMENT');
    }
}

?>