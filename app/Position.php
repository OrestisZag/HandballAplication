<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function skill() {
        return $this->hasMany('App\Skill');
    }

    public function campTrain() {
        return $this->hasMany('App\CampTrain', 'position_id');
    }

    public function athletePosition() {
        return $this->hasMany('App\AthletePosition', 'position_id');
    }
}
