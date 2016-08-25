<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AthleteData extends Model
{
    use SoftDeletes;

    public function teams() {
        return $this->belongsToMany('App\Team')->withPivot('current', 'old');
    }
}
