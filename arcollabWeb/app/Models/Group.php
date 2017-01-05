<?php 

namespace App\Models;

class Group extends \NeoEloquent {

    protected $label = 'Group';
    protected $fillable = ['name'];
    
    public function items()
    {
        return $this->hasMany('Item', 'HAS_ITEM');
    }
}

?>