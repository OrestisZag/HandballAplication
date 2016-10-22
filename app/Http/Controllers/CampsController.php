<?php

namespace App\Http\Controllers;

use App\AthleteData;
use App\AthleteData_Camp;
use App\Camp;
use App\CampTrain;
use App\Position;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Session;
use App\Http\Requests;
use Barryvdh\DomPDF\PDF;

class CampsController extends Controller
{
    private $model;

    /**
     * CampsController constructor.
     */
    public function __construct()
    {
        $this->model = new CampTrain();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $camps = Camp::where(function ($query) use ($request) {
            if ($term = $request->get('term')) {
                $query->orwhere('title', 'like', '%' .$term. '%');
                $query->orwhere('place', 'like', '%' .$term. '%');
                $query->orwhere('date', 'like', '%' .$term. '%');
            }
        })->orderBy('id')->paginate(10);

        return view('camps.index')->withCamps($camps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camps = Camp::all();
        return view('camps.create')->withCamps($camps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'place' => 'required',
            'date' => 'required|date'
        ]);

        $camp = new Camp();
        $camp->title = $request->title;
        $camp->place = $request->place;
        $camp->date = $request->date;

        Session::flash('success', 'Camp created successfully');

        return redirect()->route('camp.show', $camp->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $camp = Camp::find($id);
        $athletesCamp = AthleteData_Camp::where('camp_id', $camp['id'])->get();

        $camptrain = [];
        $athletes = [];
        foreach($athletesCamp as $athleteCamp) {
            array_push($athletes,AthleteData::find($athleteCamp->athlete_id));
            array_push($camptrain,$this->model->where(['camp_id' => $id , 'adc_id' => $athleteCamp->id])->get());
        }

        $gkat = 0;
        $gkdef = 0;
        $gktot = 0;
        $allgk = 0;
        foreach ($camptrain as $trains) {
            foreach ($trains as $train) {
                $allgk++;
                if ($train->position_id == 1)
                $gkat = ($gkat + $train->attackEval);
                $gkdef = $gkdef + $train->defenceEval;
                $gktot = $gktot + $train->atDefEval;
            }
        }


        return view('camps.show')->with('camp',$camp)
            ->with('camps',$camptrain)->with('athletes',$athletes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camp = Camp::find($id);
        return view('camps.edit')->withCamp($camp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'place' => 'required',
            'date' => 'required|date'
        ]);

        $camp = Camp::find($id);
        $camp->title = $request->title;
        $camp->place = $request->place;
        $camp->date = $request->date;
        $camp->save();

        Session::flash('success', 'Camp Updated Successfully');

        return redirect()->route('camp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camp = Camp::find($id);
        $camp->delete();

        Session::flash('success', 'Camp Deleted Successfully');

        return redirect()->route('camp.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAthleteCampEval($id) {
        $adc = AthleteData_Camp::find($id);
        $campTrain = CampTrain::where('adc_id', $adc['id'])->first();
        $athlete = AthleteData::find($adc->athlete_id);
        $athleteData = AthleteData_Camp::where('camp_id', $adc['camp_id'])->first();

        if (isset($campTrain)) {
//            $lava = new Lavacharts();
//            $evaluations = $lava->DataTable();
//
//            $evaluations->addStringColumn('Player Evaluation')
//                        ->addNumberColumn('Rank')
//                        ->addRow(['Attack', $campTrain->attackEval])
//                        ->addRow(['Defence', $campTrain->defenceEval])
//                        ->addRow(['Total', $campTrain->atDefEval]);
//
//            $lava->BarChart('Evaluation', $evaluations);

            $fullName = $athlete->lastName.' '.$athlete->firstName;

            return view('camps.showEval')->withTrain($campTrain)->withAdc($adc)->withName($fullName)->withAthlete($athleteData);
        } else {
            $positions = Position::all();
            return view('camps.createEval')->withAdc($adc)->withPositions($positions);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAthleteCampEval(Request $request) {

        $this->validate($request, [
            'date' => 'required|date'
        ]);

        $campTrain = new CampTrain();
        $campTrain->adc_id = $request->adc_id;
        $campTrain->camp_id = $request->camp_id;
        $campTrain->date = $request->date;
        $campTrain->position_id = $request->position;
        $campTrain->attackEval = $request->attackEval;
        $campTrain->defenceEval = $request->defenceEval;
        $campTrain->atDefEval = $request->attackEval + $request->defenceEval;
        $campTrain->comments = $request->comments;
        $campTrain->save();

        return redirect()->route('camp.getAthleteCampEval', $campTrain->adc_id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEditAthleteCampEval($id) {
        $evaluation = CampTrain::find($id);
        $positions = Position::all();
        return view('camps.editEval')->withEvaluation($evaluation)->withPositions($positions);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAthleteEvaluation(Request $request, $id) {
        $this->validate($request, [
            'date' => 'required|date'
        ]);

        $campTrain = CampTrain::find($id);
        $campTrain->adc_id = $request->adc_id;
        $campTrain->camp_id = $request->camp_id;
        $campTrain->date = $request->date;
        $campTrain->position_id = $request->position;
        $campTrain->attackEval = $request->attackEval;
        $campTrain->defenceEval = $request->defenceEval;
        $campTrain->atDefEval = $request->attackEval + $request->defenceEval;
        $campTrain->comments = $request->comments;
        $campTrain->save();

        Session::flash('success', 'Athlete\'s Evaluation Updated');

        return redirect()->route('camp.getAthleteCampEval', $campTrain->adc_id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function generatePDF($id) {
        $adc = AthleteData_Camp::find($id);
        $campTrain = CampTrain::where('adc_id', $adc['id'])->first();
        $athlete = AthleteData::find($adc->athlete_id);

//        $lava = new Lavacharts();
//        $evaluations = $lava->DataTable();
//
//        $evaluations->addStringColumn('Player Evaluation')
//            ->addNumberColumn('Rank')
//            ->addRow(['Attack', $campTrain->attackEval])
//            ->addRow(['Defence', $campTrain->defenceEval])
//            ->addRow(['Total', $campTrain->atDefEval]);
//
//        $lava->BarChart('Evaluation', $evaluations);
//        $complete = $lava->render('BarChart', 'Evaluation', 'chart-div');

        $fullName = $athlete->lastName.' '.$athlete->firstName;

        $data = ['name' => $fullName, 'adc' => $adc, 'train' => $campTrain];
        $view = \View::make('pdf.campAthleteEval', $data);

        return $view;
    }
}
