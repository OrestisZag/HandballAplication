<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AthleteData extends Model
{
    use SoftDeletes;

    public function athleteDataTeams() {
        return $this->hasMany('App\AthleteData_Team', 'athlete_id');
    }
}
