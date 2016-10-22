<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matches = Match::where(function ($query) use ($request) {
            if ($term = $request->get('term')) {
                $query->orwhere('home', 'like', '%' .$term. '%');
                $query->orwhere('away', 'like', '%' .$term. '%');
                $query->orwhere('date', 'like', '%' .$term. '%');
            }
        })->orderBy('date', 'desc')->paginate(10);

        return view('matches.index')->withMatches($matches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matches.create');
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
            'home' => 'required',
            'away' => 'required',
            'date' => 'required|date',
        ]);

        $match = new Match();
        $match->home = $request->home;
        $match->away = $request->away;
        $match->date = $request->date;
        $match->comments = $request->comments;
        $match->save();

        Session::flash('success', 'Match created successfully');

        return redirect()->route('match.show', $match->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match = Match::find($id);
        return view('matches.show')->withMatch($match);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::find($id);
        return view('matches.edit')->withMatch($match);
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
            'home' => 'required',
            'away' => 'required',
            'date' => 'required|date'
        ]);

        $match = Match::find($id);
        $match->home = $request->home;
        $match->away = $request->away;
        $match->date = $request->date;
        $match->comments = $request->comments;
        $match->save();

        Session::flash('success', 'Match updated successfully');

        return redirect()->route('match.show', $match->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::find($id);
        $match->delete();

        Session::flash('success', 'Match deleted');

        return redirect()->route('match.index');
    }

    public function getMatchesAsArray() {
        return Match::all();
    }
}
