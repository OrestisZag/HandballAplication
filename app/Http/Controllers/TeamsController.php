<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Http\Requests;
use Session;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('id')->paginate(10);
        return view('team.index')->withTeams($teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('team.create')->withTeams($teams);
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
            'name' => 'required|min:2|max:80',
            'level' => 'required',
            'place' => 'required',
            'telephone' => 'min:1111111111|max:9999999999999|numeric',
            'fax' => 'min:1111111111|max:9999999999999|numeric',
            'email' => 'email',
            'website' => 'url'
        ]);

        $team = new Team();
        $team->name = $request->name;
        $team->level = $request->level;
        $team->place = $request->place;
        $team->telephone = $request->telephone;
        $team->fax = $request->fax;
        $team->email = $request->email;
        $team->website = $request->website;
        $team->save();

        Session::flash('success', 'Team added successfully!');

        return redirect()->route('team.show', $team->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        return view('team.show')->withTeam($team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('team.edit')->withTeam($team);
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
            'name' => 'required|min:2|max:80',
            'level' => 'required',
            'place' => 'required',
            'telephone' => 'min:1111111111|max:9999999999999|numeric',
            'fax' => 'min:1111111111|max:9999999999999|numeric',
            'email' => 'email',
            'website' => 'url'
        ]);

        $team = new Team();
        $team->name = $request->input('name');
        $team->level = $request->input('level');
        $team->place = $request->input('place');
        $team->telephone = $request->input('telephone');
        $team->fax = $request->input('fax');
        $team->email = $request->input('email');
        $team->website = $request->input('website');
        $team->save();

        Session::flash('success', 'Team updated successfully!');

        return redirect()->route('team.show', $team->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();

        Session::flash('success', 'Team deleted successfully!');

        return redirect()->route('team.index');
    }
}
