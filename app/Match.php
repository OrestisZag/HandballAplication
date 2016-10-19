<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    use SoftDeletes;

    public function athleteSkillMatch() {
        return $this->hasMany('App\AthleteSkillMatch', 'match_id');
    }
}
