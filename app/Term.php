<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $guarded = [];
    
    public function camp()
    {
        return $this->belongsTo("\App\Camp");
    }
}
