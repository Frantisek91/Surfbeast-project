<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Term;

class Inquiry extends Model
{

    
    public function term()
    {
        return $this->belongsTo("\App\Term");
    }
}
