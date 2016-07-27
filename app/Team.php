<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    public function athleteData() {
        return $this->belongsToMany('App\AthleteData');
    }
}
