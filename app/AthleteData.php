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

    public function athleteDataCamps() {
        return $this->hasMany('App\AthleteData_Camp', 'athlete_id');
    }

    public function athleteSkillMatch() {
        return $this->hasMany('App\AthleteSkillMatch', 'athlete_id');
    }
}
