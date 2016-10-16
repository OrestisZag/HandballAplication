<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthleteData_Camp extends Model
{
    public function athleteData() {
        return $this->belongsTo('App\AthleteData');
    }

    public function camp() {
        return $this->belongsTo('App\Camp');
    }

    public function campTrain() {
        return $this->hasMany('App\CampTrain', 'adc_id');
    }
}
