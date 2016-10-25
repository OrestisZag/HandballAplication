<?php

namespace App\Http\Controllers;

use App\AthleteData;
use App\AthletePosition;
use App\AthleteSkillMatch;
use App\Match;
use App\Position;
use App\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
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
        $all = AthleteSkillMatch::all();

        $output = [];
        foreach ($all as $each) {
            $str = $each->athlete_id .'.'. $each->match_id;

            if (!array_key_exists($str, $output)) {
                $subValues =
                    [
                        'athleteLastName' => AthleteData::where(['id' => $each->athlete_id])->first()->lastName,
                        'athleteFirstName' => AthleteData::where(['id' => $each->athlete_id])->first()->firstName,
                        'home' => Match::where(['id' => $each->match_id])->first()->home,
                        'away' => Match::where(['id' => $each->match_id])->first()->away,
                        'date' => Match::where(['id' => $each->match_id])->first()->date,
                        'evalId' => $str,
                    ];

                $output[$str] = $subValues;
            }
        }

        return view('evaluation.index')->with('entities', $this->paginate($output,10));
    }

    private function paginate($array, $pages, $start = 1) {
        $count = count($array);
        $itemCollection = Collection::make($array);

        $paginator = new LengthAwarePaginator(
            $itemCollection->forPage(1, $pages),
            $count,
            $pages,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]);

        return $paginator;
    }

    public function edit($evalId)
    {
        $split = explode('.',$evalId);

        $items = $this->model->where('athlete_id',$split[0])->where('match_id',$split[1])->get();

        $returnValues = [];

        foreach ($items as $item){
            $sk = Skill::find($item->skill_id);
            $row = [
                'Skill' => $sk->title,
                'SkillGroup' => $sk->SkillGroup,
                'Evaluation' => $item->evaluation,
                'raw' => $item,
            ];

            array_push($returnValues,$row);
        }

        return view('evaluation.edit')->with('entities', $returnValues);
    }

    public function show($evalId)
    {
        $split = explode('.',$evalId);

        $items = $this->model->where('athlete_id',$split[0])->where('match_id',$split[1])->get();

        $returnValues = [];

        foreach ($items as $item){
            $sk = Skill::find($item->skill_id);
            $row = [
                'Skill' => $sk->title,
                'SkillGroup' => $sk->SkillGroup,
                'Evaluation' => $item->evaluation,
                'raw' => $item,
            ];

            array_push($returnValues,$row);
        }

        $i = 0;
        $avg = 0;

        foreach ($returnValues as $value) {
            if(!($value['SkillGroup'] === 'ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ')) {
                $i++;
                $avg += $value['Evaluation'];
            }
        }

        $avg = $avg / $i;

        return view('evaluation.show')->with('entities', $returnValues)->with('avg',$avg);
    }

    public function store(Request $request)
    {
        $athleteId = $request->athleteId;
        $matchId = $request->matchId;

        $models = [];
        foreach ($request->skill as $id => $value) {
            $newModel = new AthleteSkillMatch();

            $newModel->athlete_id = $athleteId;
            $newModel->match_id = $matchId;
            $newModel->skill_id = $id;
            $newModel->evaluation = $value;

            $newModel->save();

            array_push($models, $newModel);
        }

        return redirect()->route('evaluation.index');
    }

    public function update(Request $request)
    {
        $models = [];

        foreach ($request->skill as $id => $value) {
            $oldModel = AthleteSkillMatch::find($id);

            $oldModel->evaluation = $value;

            $oldModel->save();

            array_push($models, $oldModel);
        }

        return redirect()->route('evaluation.index');
    }

    public function create(Request $request)
    {

        $skillz = Skill::where('position_id', $request->position)->get();

        return view('evaluation.create')
            ->with('athleteID', $request->athlete)
            ->with('matchID', $request->match)
            ->with('skill', $skillz);
    }

    public function getIdByValues($athleteId, $matchId, $skillId)
    {
        $id = $this->model->where([
            'athlete_id' => $athleteId,
            'match_id' => $matchId,
            'skill_id' => $skillId])->first()->id;

        return $id;
    }

    public function getAllMatchesAndAthletes()
    {
        $athAll = AthleteData::all();
        $matchAll = Match::all();

        $pos = Position::all();

        return view('evaluation.info')
            ->with('athletes', $athAll)
            ->with('matches', $matchAll)
            ->with('positions', $pos);
    }
}
