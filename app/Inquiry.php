<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    public function camp()
    {
        return $this->belongsTo("\App\Term");
    }
}
