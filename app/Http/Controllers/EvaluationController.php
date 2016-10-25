<?php

namespace App\Http\Controllers;

use App\AthleteData;
use App\AthletePosition;
use App\AthleteSkillMatch;
use App\Match;
use App\Position;
use App\Skill;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class EvaluationController extends Controller
{
    private $model;

    /**
     * EvaluationController constructor.
     */
    public function __construct()
    {
        $this->model = new AthleteSkillMatch();
    }

    public function index()
    {
        $all = $this->model->paginate(10);

        return view('evaluation.index')->with('entities',$all);
    }

    public function edit($id)
    {
        $entity = $this->model->find($id,['*']);

        return view('evaluation.edit')->with('entity', $entity);
    }

    public function show(array $evalId)
    {
        $all = [];
        foreach ($evalId as $id) {
            array_push($all,$this->model->find($id,['*']));
        }

        return view('evaluation.show')->with('entities', $all);
    }

    public function store(Request $request)
    {
        dd($request);
    
        $athleteId = $request->athleteId;
        $matchId = $request->matchId;

        $models = [];
        foreach($request->id as $id) {
            $newModel = $this->model->create([
               'athlete_id' => $athleteId,
                'match_id' => $matchId,
                'skill_id' => $id->skillId,
                'evaluation' => $id->evaluation
            ]);

            array_push($models,$newModel);
        }

        return view('evaluation.show')->with('entities', $models);
    }

    public function update(Request $request, $id)
    {
        $oldModel = $this->model->find($id);
        $oldModel->update($request->except(['_token', '_method']));

        return view('evaluation.show')->with('entity', $this->model->find($id));
    }

    public function create(Request $request)
    {

        $skillz = Skill::where('position_id',$request->position)->get();

        return view('evaluation.create')
            ->with('athleteID',$request->athlete)
            ->with('matchID',$request->match)
            ->with('skill',$skillz);
    }

    public function getIdByValues($athleteId, $matchId, $skillId)
    {
        $id = $this->model->where([
            'athlete_id'=>$athleteId,
            'match_id'=>$matchId,
            'skill_id'=>$skillId])->first()->id;

        return $id;
    }

    public function getAllMatchesAndAthletes()
    {
        $athAll = AthleteData::all();
        $matchAll = Match::all();

        $pos = Position::all();

        return view('evaluation.info')
            ->with('athletes', $athAll)
            ->with('matches' , $matchAll)
            ->with('positions',$pos);
    }
}
