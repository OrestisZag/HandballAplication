<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->date('birthday');
            $table->double('height', 3, 2);
            $table->decimal('weight', 6, 3);
            $table->string('telephone1');
            $table->string('telephone2');
            $table->string('fax');
            $table->string('teamFax');
            $table->string('email1');
            $table->string('email2');
            $table->string('country');
            $table->string('region');
            $table->string('address');
            $table->string('postalCode');
            $table->string('passportNumber');
            $table->date('passportExpDate');
            $table->string('passportLastName');
            $table->string('IDNumber');
            $table->string('photo');
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
        Schema::drop('athlete_datas');
    }
}
