<?php

namespace App\Http\Controllers;

use App\Camp;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class CampsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camps = Camp::orderBy('id')->paginate(10);
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
            'date' => 'required|Date'
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
        //
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
}
