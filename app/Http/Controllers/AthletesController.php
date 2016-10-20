<?php

namespace App\Http\Controllers;

use App\AthleteData_Camp;
use App\AthleteData_Team;
use App\AthletePosition;
use App\Position;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\AthleteData;
use App\Team;
use App\Camp;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class AthletesController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $athletes = AthleteData::where(function ($query) use ($request) {
            if ($term = $request->get('term')) {
                $query->orwhere('lastName', 'like', '%' .$term. '%');
                $query->orwhere('firstName', 'like', '%' .$term. '%');
            }
        })->orderBy('id')->paginate(10);

        return view('athletes.index')->withAthletes($athletes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $athletes = AthleteData::all();
        $teams = Team::all();
        $camps = Camp::all();
        $positions = Position::all();
        return view('athletes.create')->withAthletes($athletes)->withTeams($teams)->withCamps($camps)->withPositions($positions);
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
            'lastName' => 'required|min:2|max:40|alpha',
            'firstName' => 'required|min:2|max:40|alpha',
            'birthday' => 'required|date',
            'height' => 'numeric|min:0.5|max:2.50',
            'weight' => 'numeric|min:30|max:150',
            'positions' => 'required',
            'mobile' => 'mobile|min:10|max:15',
            'telephone1' => 'telephone|min:10|max:15',
            'telephone2' => 'telephone|min:10|max:15',
            'fax' => 'telephone|min:10|max:15',
            'email1' => 'email',
            'email2' => 'email',
            'country' => 'required|min:4|max:40',
            'region' => 'required|min:4|max:40',
            'address' => 'required|min:5|max:255',
            'postalCode' => 'max:10',
            'passportNumber' => 'max:50',
            'passportExpDate' => 'date',
            'passportLastName' => 'min:2|max:40|alpha',
            'passportFirstName' => 'min:2|max:40|alpha',
            'IDNumber' => 'max:10',
            'photo' => 'sometimes|required|image',
            'comments' => 'max:500'
        ]);

        $athlete = new AthleteData();
        $athlete->lastName = $request->lastName;
        $athlete->firstName = $request->firstName;
        $athlete->birthday = $request->birthday;
        $athlete->height = $request->height;
        $athlete->weight = $request->weight;
        $athlete->mobile = $request->mobile;
        $athlete->telephone1 = $request->telephone1;
        $athlete->telephone2 = $request->telephone2;
        $athlete->fax = $request->fax;
        $athlete->email1 = $request->email1;
        $athlete->email2 = $request->email2;
        $athlete->country = $request->country;
        $athlete->region = $request->region;
        $athlete->address = $request->address;
        $athlete->postalCode = $request->postalCode;
        $athlete->passportNumber = $request->passportNumber;
        $athlete->passportExpDate = $request->passportExpDate;
        $athlete->passportLastName = $request->passportLastName;
        $athlete->passportFirstName = $request->passportFirstName;
        $athlete->IDNumber = $request->IDNumber;
        $athlete->comments = $request->comments;
        $athlete->save();

        if(Input::file('photo')) {
            $imageName = $athlete->id.'.png';
            $request->file('photo')->move(base_path().'/public/athletePhoto', $imageName);

            DB::table('athlete_datas')
                ->where('id', $athlete->id)
                ->update(['photo' => base_path().'/public/athletePhoto/'.$athlete->id.'.png']);
        }

        if(isset($request->teams)) {
            $athleteTeam = new AthleteData_Team();
            $athleteTeam->athlete_id = $athlete->id;
            $athleteTeam->team_id = $request->teams;
            $athleteTeam->currentTeam = true;
            $athleteTeam->signed = $request->signed;
            $athleteTeam->save();
        }

        if(isset($request->oldTeams[0])) {
            $max = 1;
            for($i=0; $i<$max; $i++){
                if (isset($request->oldTeams[$i])) {
                    $athleteTeam = new AthleteData_Team();
                    $athleteTeam->athlete_id = $athlete->id;
                    $athleteTeam->team_id = $request->oldTeams[$i];
                    $athleteTeam->currentTeam = false;
                    $athleteTeam->signed = $request->signed_old[$i];
                    $athleteTeam->left = $request->left[$i];
                    $athleteTeam->save();
                    $max++;
                } else{
                    $max = $i;
                }
            }
        }

        if (isset($request->camps)) {
            foreach ($request->camps as $camp) {
                $athleteCamp = new AthleteData_Camp();
                $athleteCamp->athlete_id = $athlete->id;
                $athleteCamp->camp_id = $camp;
                $athleteCamp->save();
            }
        }

        foreach ($request->positions as $position) {
            $athletePosition = new AthletePosition();
            $athletePosition->athlete_id = $athlete->id;
            $athletePosition->position_id = $position;
            $athletePosition->save();
        }

        Session::flash('success', 'Player info added successfully!');

        return redirect()->route('athlete.show', $athlete->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $athlete = AthleteData::find($id);
        $ap = AthletePosition::where('athlete_id', $id)->get();
        return view('athletes.show')->withAthlete($athlete)->withAp($ap);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $athlete = AthleteData::find($id);
        $teams = Team::all();
        $positions = Position::all();
        $ap = AthletePosition::where('athlete_id', $id)->get();
        $camps = Camp::all();
        $camps2 = array();
        foreach ($camps as $camp) {
            $camps2[$camp->id] = $camp->title.', '.date('Y', strtotime($camp->date));
        }

        return view('athletes.edit')->withAthlete($athlete)->withTeams($teams)->withCamps($camps2)->withPositions($positions)->withAp($ap);
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
            'lastName' => 'required|min:2|max:40|alpha',
            'firstName' => 'required|min:2|max:40|alpha',
            'birthday' => 'required|date',
            'height' => 'required|numeric|min:0.5|max:2.50',
            'weight' => 'required|numeric|min:30|max:150',
            'mobile' => 'mobile|min:10|max:15',
            'telephone1' => 'telephone|min:10|max:15',
            'telephone2' => 'telephone|min:10|max:15',
            'fax' => 'telephone|min:10|max:15',
            'email1' => 'email',
            'email2' => 'email',
            'country' => 'required|min:4|max:30',
            'region' => 'required|min:4|max:30',
            'address' => 'required|min:5|max:255',
            'postalCode' => 'max:10',
            'passportNumber' => 'max:50',
            'passportExpDate' => 'date',
            'passportLastName' => 'min:2|max:40|alpha',
            'passportFirstName' => 'min:2|max:40|alpha',
            'IDNumber' => 'max:10',
            'photo' => 'sometimes|required|image',
            'comments' => 'max:255'
        ]);

        $athlete = AthleteData::find($id);
        $athlete->lastName = $request->input('lastName');
        $athlete->firstName = $request->input('firstName');
        $athlete->birthday = $request->input('birthday');
        $athlete->height = $request->input('height');
        $athlete->weight = $request->input('weight');
        $athlete->mobile = $request->input('mobile');
        $athlete->telephone1 = $request->input('telephone1');
        $athlete->telephone2 = $request->input('telephone2');
        $athlete->fax = $request->input('fax');
        $athlete->email1 = $request->input('email1');
        $athlete->email2 = $request->input('email2');
        $athlete->country = $request->input('country');
        $athlete->region = $request->input('region');
        $athlete->address = $request->input('address');
        $athlete->postalCode = $request->input('postalCode');
        $athlete->passportNumber = $request->input('passportNumber');
        $athlete->passportExpDate = $request->input('passportExpDate');
        $athlete->passportLastName = $request->input('passportLastName');
        $athlete->passportFirstName = $request->input('passportFirstName');
        $athlete->IDNumber = $request->input('IDNumber');
        if(Input::hasFile('photo'))
        {
            $file = Input::file('photo');
            $imageName = base_path().'/public/athletePhoto/'.$athlete->id.'.png';
            $file = $file->move(base_path().'/public/athletePhoto', $imageName);
            $athlete->photo = $imageName;
        }
        $athlete->comments = $request->input('comments');
        $athlete->save();

        if(isset($request->teams)) {
            if($athleteTeam = AthleteData_Team::where('athlete_id', '=', "$id")->where('currentTeam', '=', '1')->first()){
                $athleteTeam->currentTeam = false;
                $athleteTeam->left = date('Y');
                $athleteTeam->save();
            }
            $athleteTeam = new AthleteData_Team();
            $athleteTeam->athlete_id = $id;
            $athleteTeam->team_id = $request->teams;
            $athleteTeam->currentTeam = true;
            $athleteTeam->signed = $request->signed;
            $athleteTeam->save();
        }

        if(isset($request->oldTeams[0])) {
            $max = 1;
            for($i=0; $i<$max; $i++){
                if (isset($request->oldTeams[$i])) {
                    $athleteTeam = new AthleteData_Team();
                    $athleteTeam->athlete_id = $athlete->id;
                    $athleteTeam->team_id = $request->oldTeams[$i];
                    $athleteTeam->currentTeam = false;
                    $athleteTeam->signed = $request->signed_old[$i];
                    $athleteTeam->left = $request->left[$i];
                    $athleteTeam->save();
                    $max++;
                } else{
                    $max = $i;
                }
            }
        }

        if (isset($request->camps)) {
            foreach ($request->camps as $camp) {
                $athleteCamp = new AthleteData_Camp();
                $athleteCamp->athlete_id = $athlete->id;
                $athleteCamp->camp_id = $camp;
                $athleteCamp->save();
            }
        }

        $allAthletePos = AthletePosition::where('athlete_id', $athlete->id)->get();
        foreach ($allAthletePos as $del) {
            $del->delete();
        }
        foreach ($request->positions as $position) {
            $athletePosition = new AthletePosition();
            $athletePosition->athlete_id = $athlete->id;
            $athletePosition->position_id = $position;
            $athletePosition->save();
        }

        Session::flash('success', 'Player info updated successfully!');

        return redirect()->route('athlete.show', $athlete->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $athlete = AthleteData::find($id);
        $athlete->delete();

        Session::flash('success', 'Athlete deleted successfully!');

        return redirect()->route('athlete.index');
    }
}
