<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::where(function ($query) use ($request) {
            if ($term = $request->get('term')) {
                $query->orwhere('name', 'like', '%' .$term. '%');
                $query->orwhere('date', 'like', '%' .$term. '%');
            }
        })->orderBy('id')->paginate(10);

        return view('events.index')->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('events.create')->withCategories($categories);
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
            'date' => 'required|date'
        ]);

        $event = new Event();
        $event->name = $request->name;
        $event->category_id = $request->category;
        $event->date = $request->date;
        $event->save();

        Session::flash('success', 'Event Created Successfully');

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show')->withEvent($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $categories = Category::all();
        return view('events.edit')->withCategories($categories)->withEvent($event);

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
            'date' => 'required|date'
        ]);

        $event = Event::find($id);
        $event->name = $request->name;
        $event->category_id = $request->category;
        $event->date = $request->date;
        $event->save();

        Session::flash('success', 'Event Created Successfully');

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
