<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public function camps()
    {
        return $this->hasMany("\App\Camp");
    }
}
