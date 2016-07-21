<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function athleteData() {
        $this->belongsToMany('App\AthleteData');
    }
}
