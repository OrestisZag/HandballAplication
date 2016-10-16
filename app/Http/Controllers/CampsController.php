<?php

namespace App\Http\Controllers;

use App\AthleteData_Camp;
use App\Camp;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class CampsController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camp = Camp::find($id);
        return view('camps.show')->withCamp($camp);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getAthleteCampEval($id) {
        $adc = AthleteData_Camp::find($id);

//        dd($adc);

        return $adc;
    }
}
