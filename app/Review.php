<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'id', 'user_id', 'rating', 'description', 'camp_id' 
    ];

    public function camp()
    {
        return $this->belongsTo("\App\Camp");
    }

    public function user()
    {
        return $this->belongsTo("\App\User");
    }
}
