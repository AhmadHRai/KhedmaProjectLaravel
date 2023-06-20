<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
