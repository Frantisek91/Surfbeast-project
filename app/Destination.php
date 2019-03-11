<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'name', "description"
    ];
    
    public function camps()
    {
        return $this->hasMany("\App\Camp");
    }

    
}
