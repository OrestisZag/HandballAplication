<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampTrain extends Model
{
    public function position() {
        return $this->belongsTo('App\Position');
    }

    public function athleteCamp() {
        return $this->belongsTo('App\AthleteData_Camp');
    }
}
