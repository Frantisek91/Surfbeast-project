<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    
    public function camps()
    {
        return $this->hasMany("\App\Camp");
    }

}
