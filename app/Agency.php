<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $guarded = [];
    
    public function camps()
    {
        return $this->hasMany("\App\Camp");
    }

}
