<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Resources\Event as EventResource;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Event::orderBy('first_date', 'asc')->get();
        return EventResource::collection(Event::orderBy('first_date', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'date' => ['required', 'date'],
            'begin_hour' => ['required', 'date_format:G:i'],
            'end_hour' => ['required', 'date_format:G:i'],
            "name" => ["required", 'string', 'max:255'],
            "description" => ["required", 'string', 'max:500']
        ]);

        $parsedDate = Date::parse($request->date);
        return Event::create([
            "name" => $request->name,
            "description" => $request->description,
            "first_date" => $request->date,
            "first_date_day_name" => $parsedDate->format('D'),
            "first_date_week_parity" => intval($parsedDate->format('W')) % 2,
            "begin_hour" => $request->begin_hour,
            "end_hour" => $request->end_hour,
            "do_every_day" => $request->has('every_day') ? 1 : 0,
            "do_every_week" => $request->has('every_week') ? 1 : 0,
            "do_every_two_weeks" => $request->has('every_two_weeks') ? 1 : 0
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        return $event->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        return $event->delete();
    }
}
