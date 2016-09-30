<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camp extends Model
{
    use SoftDeletes;

    public function athleteDataCamps() {
        return $this->hasMany('App\AthleteData_Camp', 'camp_id');
    }
}
