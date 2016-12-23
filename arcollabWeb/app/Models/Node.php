<?php 

namespace App\Models;

class Node extends \NeoEloquent {

    protected $label = 'Node';
    protected $fillable = ['name', 'email'];
    
    public function hasNode()
    {
        return $this->hasOne('Node', 'HAS ONE');
    }
    
        public function likes()
    {
        return $this->hasMany('Node', 'LIKES');
    }
}

?>