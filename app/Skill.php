<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function position() {
        return $this->belongsTo('App\Position');
    }

    public function athleteSkillMatch() {
        return $this->hasMany('App\AthleteSkillMatch', 'skill_id');
    }
}
