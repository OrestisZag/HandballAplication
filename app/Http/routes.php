<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Pages routes
Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('about', function () {
    return view('pages.about');
});

//Athlete routes
Route::resource('athlete', 'AthletesController');

//Team routes
Route::resource('team', 'TeamsController');

//Camp routes
Route::resource('camp', 'CampsController');
$this->get('camp/athleteEvaluation/{id}', ['uses' => 'CampsController@getAthleteCampEval', 'as' => 'camp.getAthleteCampEval']);
$this->post('camp/athleteEvaluation', ['uses' => 'CampsController@postAthleteCampEval', 'as' => 'camp.storeAthleteEval']);
$this->get('camp/{id}/editAthleteEvaluation', ['uses' => 'CampsController@getEditAthleteCampEval', 'as' => 'camp.getEditAthleteCampEval']);
$this->put('camp/updateEvaluation/{id}', ['uses' => 'CampsController@updateAthleteEvaluation', 'as' => 'camp.updateAthleteEvaluation']);
$this->get('camp/evaluationToPDF/{id}', ['uses' => 'CampsController@generatePDF', 'as' => 'camp.exportToPdf']);

//Match routes
Route::resource('match', 'MatchesController');
