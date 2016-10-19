<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthletePosition extends Model
{
    public function athletesData() {
        return $this->belongsTo('App\AthleteData');
    }

    public function position() {
        return $this->belongsTo('App\Position');
    }
}
