<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public function camp()
    {
        return $this->belongsTo("\App\Camp");
    }
}
