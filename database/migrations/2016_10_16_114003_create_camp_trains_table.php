<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_trains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('adc_id')->unsigned(); //athlete_d
            $table->foreign('adc_id')->references('athlete_id')->on('athlete_data__camps');//athlete_d
            $table->integer('camp_id')->unsigned();
            $table->foreign('camp_id')->references('id')->on('camps');
            $table->date('date');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->integer('attackEval');
            $table->integer('defenceEval');
            $table->integer('atDefEval');
            $table->text('comments');
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
        Schema::drop('camp_trains');
    }
}
