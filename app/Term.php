<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $dates = ["start", "end"];

    protected $guarded = [];
    
    public function camp()
    {
        return $this->belongsTo("\App\Camp");
    }

    public function inquiries()
    {
        return $this->hasMany("\App\Inquiry");
    }
}
