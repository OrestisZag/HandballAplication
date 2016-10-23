<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthleteEvent extends Model
{
    public function athleteData()
    {
        return $this->belongsTo('App\AthleteData');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
