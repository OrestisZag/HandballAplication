<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthleteData_Team extends Model
{
    public function athleteData() {
        return $this->belongsTo('App\AthleteData');
    }

    public function team() {
        return $this->belongsTo('App\Team');
    }
}
