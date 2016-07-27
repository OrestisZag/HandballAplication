<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\AthleteData;
use App\Team;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class AthletesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athletes = AthleteData::orderBy('id')->paginate(10);
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
        return view('athletes.create')->withAthletes($athletes)->withTeams($teams);
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
            'lastName' => 'required|min:2|max:30|alpha',
            'firstName' => 'required|min:2|max:30|alpha',
            'birthday' => 'required|date',
            'height' => 'required|numeric|min:0.5|max:2.50',
            'weight' => 'required|numeric|min:30|max:150',
            'mobile' => 'mobile|min:10|max:15',
            'telephone1' => 'telephone|min:10|max:15',
            'telephone2' => 'telephone|min:10|max:15',
            'fax' => 'telephone|min:10|max:15',
            'teamFax' => 'telephone|min:10|max:15',
            'email1' => 'email',
            'email2' => 'email',
            'country' => 'required|min:4|max:30',
            'region' => 'required|min:4|max:30',
            'address' => 'required|min:5|max:50',
            'postalCode' => 'max:10',
            'passportNumber' => 'max:50',
            'passportExpDate' => 'date',
            'passportLastName' => 'min:2|max:30|alpha',
            'IDNumber' => 'max:10',
            'comments' => 'max:255'
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
        $athlete->teamFax = $request->teamFax;
        $athlete->email1 = $request->email1;
        $athlete->email2 = $request->email2;
        $athlete->country = $request->country;
        $athlete->region = $request->region;
        $athlete->address = $request->address;
        $athlete->postalCode = $request->postalCode;
        $athlete->passportNumber = $request->passportNumber;
        $athlete->passportExpDate = $request->passportExpDate;
        $athlete->passportLastName = $request->passportLastName;
        $athlete->IDNumber = $request->IDNumber;
        $athlete->comments = $request->comments;
        $athlete->save();
        $athlete->teams()->sync($request->teams, false);

        if(Input::file('photo')) {
            $imageName = $athlete->id.'.png';
            $request->file('photo')->move(base_path().'/public/athletePhoto', $imageName);

            DB::table('athlete_datas')
                ->where('id', $athlete->id)
                ->update(['photo' => base_path().'/public/athletePhoto/'.$athlete->id.'.png']);
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
        return view('athletes.show')->withAthlete($athlete);
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
        return view('athletes.edit')->withAthlete($athlete);
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
            'lastName' => 'required|min:2|max:30|alpha',
            'firstName' => 'required|min:2|max:30|alpha',
            'birthday' => 'required|date',
            'height' => 'required|numeric|min:0.5|max:2.50',
            'weight' => 'required|numeric|min:30|max:150',
            'mobile' => 'mobile|min:10|max:15',
            'telephone1' => 'telephone|min:10|max:15',
            'telephone2' => 'telephone|min:10|max:15',
            'fax' => 'telephone|min:10|max:15',
            'teamFax' => 'telephone|min:10|max:15',
            'email1' => 'email',
            'email2' => 'email',
            'country' => 'required|min:4|max:30',
            'region' => 'required|min:4|max:30',
            'address' => 'required|min:5|max:50',
            'postalCode' => 'max:10',
            'passportNumber' => 'max:50',
            'passportExpDate' => 'date',
            'passportLastName' => 'min:2|max:30|alpha',
            'IDNumber' => 'max:10',
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
        $athlete->teamFax = $request->input('teamFax');
        $athlete->email1 = $request->input('email1');
        $athlete->email2 = $request->input('email2');
        $athlete->country = $request->input('country');
        $athlete->region = $request->input('region');
        $athlete->address = $request->input('address');
        $athlete->postalCode = $request->input('postalCode');
        $athlete->passportNumber = $request->input('passportNumber');
        $athlete->passportExpDate = $request->input('passportExpDate');
        $athlete->passportLastName = $request->input('passportLastName');
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
