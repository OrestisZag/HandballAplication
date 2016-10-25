<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('athlete_id_1')->unsigned();
            $table->foreign('athlete_id_1')->references('id')->on('athlete_datas');
            $table->integer('athlete_id_2')->unsigned();
            $table->foreign('athlete_id_2')->references('id')->on('athlete_datas');
            $table->integer('athlete_id_3')->unsigned();
            $table->foreign('athlete_id_3')->references('id')->on('athlete_datas');
            $table->integer('athlete_id_4')->unsigned();
            $table->foreign('athlete_id_4')->references('id')->on('athlete_datas');
            $table->integer('athlete_id_5')->unsigned();
            $table->foreign('athlete_id_5')->references('id')->on('athlete_datas');
            $table->integer('athlete_id_6')->unsigned();
            $table->foreign('athlete_id_6')->references('id')->on('athlete_datas');
            $table->integer('athlete_id_7')->unsigned();
            $table->foreign('athlete_id_7')->references('id')->on('athlete_datas');
            $table->double('teamScor');
            $table->longText('comments')->nullable();
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
        Schema::drop('lines');
    }
}
