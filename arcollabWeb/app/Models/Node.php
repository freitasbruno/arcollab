<?php 

namespace App\Models;

class Node extends \NeoEloquent {

    protected $label = 'Node';

    protected $fillable = ['name', 'email'];
}

?>