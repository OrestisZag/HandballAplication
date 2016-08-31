<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AthleteData extends Model
{
    use SoftDeletes;

//    public function teams() {
//        return $this->belongsToMany('App\Team');
//    }

    public function athleteDataTeam() {
        return $this->hasMany('App\AthleteData_Team');
    }
}
