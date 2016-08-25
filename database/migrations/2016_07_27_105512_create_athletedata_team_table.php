<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthletedataTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_data_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('athlete_data_id')->unsigned();
            $table->foreign('athlete_data_id')->references('id')->on('athlete_datas');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->boolean('current');
            $table->boolean('old');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('athlete_data_team');
    }
}
