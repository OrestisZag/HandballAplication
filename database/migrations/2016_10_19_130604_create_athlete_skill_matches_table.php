<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteSkillMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_skill_matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('athlete_id')->unsigned();
            $table->foreign('athlete_id')->references('id')->on('athlete_datas');
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('matches');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('athlete_skill_matches');
    }
}
