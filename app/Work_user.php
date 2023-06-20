<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_user extends Model
{
    protected $fillable = [
        'id', 'title', 'price', 'date_start','date_end' , 'user_id_w' ,'user_id_c'
    ];
}
