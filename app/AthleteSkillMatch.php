<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthleteSkillMatch extends Model
{
    public function athletesData() {
        return $this->belongsTo('App\AthleteData');
    }

    public function skills() {
        return $this->belongsTo('App\Skill');
    }

    public function matches() {
        return $this->belongsTo('App\Match');
    }
}
