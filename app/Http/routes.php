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

$this->group(['namespace' => 'Auth'], function () {
    $this->get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
    $this->post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
    $this->get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
});

$this->group(['middleware' => 'auth'], function () {

    //Athlete routes
    Route::resource('athlete', 'AthletesController');

    //Team routes
    Route::resource('team', 'TeamsController');

    //Category routes
    Route::resource('category', 'CategoriesController');

    //Event routes
    Route::resource('event', 'EventsController');

    //Camp routes
    Route::resource('camp', 'CampsController');
    $this->get('camp/athleteEvaluation/{aId}/{cId}', ['uses' => 'CampsController@getAthleteCampEval', 'as' => 'camp.getAthleteCampEval']);
    $this->post('camp/athleteEvaluation', ['uses' => 'CampsController@postAthleteCampEval', 'as' => 'camp.storeAthleteEval']);
    $this->get('camp/{id}/editAthleteEvaluation', ['uses' => 'CampsController@getEditAthleteCampEval', 'as' => 'camp.getEditAthleteCampEval']);
    $this->put('camp/updateEvaluation/{id}', ['uses' => 'CampsController@updateAthleteEvaluation', 'as' => 'camp.updateAthleteEvaluation']);
    //$this->get('camp/evaluationToPDF/{id}', ['uses' => 'CampsController@generatePDF', 'as' => 'camp.exportToPdf']);

    //Match routes
    Route::resource('match', 'MatchesController');

    Route::resource('evaluation', 'EvaluationController', ['except' => ['create']]);

    $this->post('evaluation/create' , ['uses' => 'EvaluationController@create', 'as' => 'evaluation.create']);

    $this->get('matches/asArray/',['uses' => 'MatchesController@getMatchesAsArray', 'as' => 'matches.array']);

    $this->get('evaluation/{athleteId}/{matchId}/{skillId}', ['uses' => 'EvaluationController@getIdByValues', 'as' => 'evaluation.getId']);

    $this->get('evaluation/info/all',['uses' => 'EvaluationController@getAllMatchesAndAthletes', 'as' => 'evaluation.info']);

    $this->group(['middleware' => 'admin'], function () {
        Route::resource('user', 'UserController');
    });
});