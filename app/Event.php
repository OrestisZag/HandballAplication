<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function athleteEvent()
    {
        return $this->hasMany('App\AthleteEvent', 'event_id');
    }
}
