<?php 

namespace App\Models;

class Issue extends \NeoEloquent {

    protected $label = 'Issue';
    protected $fillable = ['title', 'description', 'status'];
}

?>