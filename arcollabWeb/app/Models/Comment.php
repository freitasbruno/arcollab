<?php 

namespace App\Models;

class Comment extends \NeoEloquent {

    protected $label = 'Comment';
    protected $fillable = ['description'];
}

?>