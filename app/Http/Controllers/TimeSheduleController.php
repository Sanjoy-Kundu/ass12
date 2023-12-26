<?php

namespace App\Http\Controllers;

use App\Models\TimeShedule;
use Carbon\Carbon;
use App\Models\Bus;
use Illuminate\Http\Request;

class TimeSheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $times =  TimeShedule::all();
        return view('Backend.time.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Buses = Bus::all();
        return view('Backend.time.create', compact('Buses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'bus_id' => 'required',
            'time' => 'required'
        ],
        [
            'bus_id.required' => "Please choose one",
            'time.required' => "Time field is required",
        ]);

         $busId = $request->input('bus_id');
         $startingTime  = Carbon::createFromFormat('H:i',$request->input('time'))->format('h:i A');
        //$time = $request->input('time');

        TimeShedule::create([
            'bus_id'=>  $busId,
            'time' => $startingTime
        ]);

        return back()->withSuccess('Time inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeShedule $timeShedule, $time_view_id)
    {
        // return $time_view_id;
        // die();
        $timelist = TimeShedule::find($time_view_id);
        return view('Backend.time.view', compact('timelist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeShedule $timeShedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimeShedule $timeShedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeShedule $timeShedule)
    {
        //
    }
}
