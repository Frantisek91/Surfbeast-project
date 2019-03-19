<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    public function agency()
    {
        return $this->belongsTo("\App\Agency");
    }

    public function destination()
    {
        return $this->belongsTo("\App\Destination");
    }

    public function terms()
    {
        return $this->hasMany("\App\Term");
    }

    public function reviews()
    {
        return $this->hasMany("\App\Review");
    }

    public function inquiries()
    {
        return $this->hasMany("\App\Inquiry");
    }
}
