<?php

namespace App\Http\Controllers;


use App\AthleteData;
use App\AthleteSkillMatch;
use Illuminate\Http\Request;
use App\Lines;
use App\Skill;

class LinesController extends Controller
{

    public function create()
    {
        $all = AthleteData::all();

        $output = [];

        foreach ($all as $athlete) {
            $skill = AthleteSkillMatch::where(['athlete_id' => $athlete->id])->get();

            if (!$skill->isEmpty()) {
                $value = [];

                $value['FirstName'] = $athlete->firstName;
                $value['LastName'] = $athlete->lastName;
                $value['Id'] = $athlete->id;
                $value['raw'] = $athlete;

                array_push($output, $value);
            }

        }

        return view('line.create')->with('entities', $output);
    }

    public function index()
    {
        $all = Lines::orderBy('id', 'desc')->paginate(10);

        return view('line.index')->with('entities', $all);
    }

    public function show($id)
    {
        $line = Lines::find($id);

        $inner['firstName'] = AthleteData::find($line->athlete_id_1)->firstName;
        $inner['lastName'] = AthleteData::find($line->athlete_id_1)->lastName;
        $inner['avg'] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $line->athlete_id_1])->get());

        $returnValue['adc1'] = $inner;

        $inner['firstName'] = AthleteData::find($line->athlete_id_2)->firstName;
        $inner['lastName'] = AthleteData::find($line->athlete_id_2)->lastName;
        $inner['avg'] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $line->athlete_id_2])->get());

        $returnValue['adc2'] = $inner;

        $inner['firstName'] = AthleteData::find($line->athlete_id_3)->firstName;
        $inner['lastName'] = AthleteData::find($line->athlete_id_3)->lastName;
        $inner['avg'] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $line->athlete_id_3])->get());

        $returnValue['adc3'] = $inner;

        $inner['firstName'] = AthleteData::find($line->athlete_id_4)->firstName;
        $inner['lastName'] = AthleteData::find($line->athlete_id_4)->lastName;
        $inner['avg'] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $line->athlete_id_4])->get());

        $returnValue['adc4'] = $inner;

        $inner['firstName'] = AthleteData::find($line->athlete_id_5)->firstName;
        $inner['lastName'] = AthleteData::find($line->athlete_id_5)->lastName;
        $inner['avg'] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $line->athlete_id_5])->get());

        $returnValue['adc5'] = $inner;

        $inner['firstName'] = AthleteData::find($line->athlete_id_6)->firstName;
        $inner['lastName'] = AthleteData::find($line->athlete_id_6)->lastName;
        $inner['avg'] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $line->athlete_id_6])->get());

        $returnValue['adc6'] = $inner;

        $inner['firstName'] = AthleteData::find($line->athlete_id_7)->firstName;
        $inner['lastName'] = AthleteData::find($line->athlete_id_7)->lastName;
        $inner['avg'] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $line->athlete_id_7])->get());

        $returnValue['adc7'] = $inner;

        $returnValue['general'] = $line->teamScor;

        $returnValue['comments'] = $line->comments;

        return view('line.show')->with('entity', $returnValue);
    }

    public function store(Request $request)
    {
        $lines = new Lines();

        $lines->athlete_id_1 = $request->adc1;
        $lines->athlete_id_2 = $request->adc2;
        $lines->athlete_id_3 = $request->adc3;
        $lines->athlete_id_4 = $request->adc4;
        $lines->athlete_id_5 = $request->adc5;
        $lines->athlete_id_6 = $request->adc6;
        $lines->athlete_id_7 = $request->adc7;

        $allMatches = [];

        $allMatches[0] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $request->adc1])->get());
        $allMatches[1] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $request->adc2])->get());
        $allMatches[2] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $request->adc3])->get());
        $allMatches[3] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $request->adc4])->get());
        $allMatches[4] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $request->adc5])->get());
        $allMatches[5] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $request->adc6])->get());
        $allMatches[6] = $this->getAvg(AthleteSkillMatch::where(['athlete_id' => $request->adc7])->get());

        $avg = 0;

        foreach ($allMatches as $value) {
            $avg += $value;
        }

        $avg = $avg / 7;

        $lines->teamScor = $avg;

        if ($request->comments) {
            $lines->comments = $request->comments;
        }

        $lines->save();

        return redirect()->route('line.index');
    }

    private function getAvg($value)
    {
        $i = 0;
        $avg = 0;

        foreach ($value as $one) {
            $skill = Skill::find($one->skill_id)->first();
            if (!($skill->SkillGroup === 'ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ')) {
                $i++;
                $avg += $one->evaluation;
            }
        }

        $avg = $avg / $i;

        return $avg;
    }
}
