<?php 

namespace App\Models;

class Attachement extends \NeoEloquent {

    protected $label = 'Attachement';
    protected $fillable = ['filename', 'extension', 'commentId'];

    public function comment()
    {
        return $this->belongsTo('Comment', 'HAS_ATTACHEMENT');
    }
}

?>