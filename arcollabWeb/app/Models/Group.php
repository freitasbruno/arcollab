<?php 

namespace App\Models;

class Group extends \NeoEloquent {

    protected $label = 'Group';
    protected $fillable = ['name'];
    
    public function project()
    {
        return $this->belongsTo('Project', 'HAS_GROUP');
    }
}

?>