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

    //Camp routes
    Route::resource('camp', 'CampsController');
    $this->get('camp/athleteEvaluation/{id}', ['uses' => 'CampsController@getAthleteCampEval', 'as' => 'camp.getAthleteCampEval']);
    $this->post('camp/athleteEvaluation', ['uses' => 'CampsController@postAthleteCampEval', 'as' => 'camp.storeAthleteEval']);
    $this->get('camp/{id}/editAthleteEvaluation', ['uses' => 'CampsController@getEditAthleteCampEval', 'as' => 'camp.getEditAthleteCampEval']);
    $this->put('camp/updateEvaluation/{id}', ['uses' => 'CampsController@updateAthleteEvaluation', 'as' => 'camp.updateAthleteEvaluation']);
    $this->get('camp/evaluationToPDF/{id}', ['uses' => 'CampsController@generatePDF', 'as' => 'camp.exportToPdf']);

    //Match routes
    Route::resource('match', 'MatchesController');

    Route::resource('evaluation', 'EvaluationController');

    $this->get('matches/asArray/',['uses' => 'MatchesController@getMatchesAsArray', 'as' => 'matches.array']);

    $this->get('evaluation/{athleteId}/{matchId}/{skillId}', ['uses' => 'EvaluationController@getIdByValues', 'as' => 'evaluation.getId']);

    //if not working just move this outside the last bracket
    $this->group(['middleware' => 'admin'], function () {
//        $this->get('user',['uses' => 'UserController@index', 'as' => 'user.index']);
//        $this->get('user/{id}',['uses' => 'UserController@show', 'as' => 'user.show']);
//        $this->put('user/{id}',['uses' => 'UserController@update', 'as' => 'user.update']);
//        $this->put('user/create',['uses' => 'UserController@create', 'as' => 'user.create']);
//        $this->post('user',['uses' => 'UserController@store', 'as' => 'user.store']);
        Route::resource('user', 'UserController');
    });
});