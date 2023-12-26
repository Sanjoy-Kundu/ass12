<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\City;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\TimeShedule;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TripController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return view('Backend.trip.index',compact('trips'));
    }

    /**
     * Show the form for creating a new trip.
     */
    public function create()
    {
        $cities = City::all();
        $drivers = Driver::all();
        $buses   = Bus::all();
        $times  = TimeShedule::all();
        return view('Backend.trip.create', compact(['cities', 'drivers', 'buses', 'times']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       
        // $request->validate([
        //    'start_journey_city_id' => 'required',
        //    'stop_journey_city_id' => 'required',
        //    'driver_name' => 'required',
        //    'trip_date' => 'required',
        //    'bus_name_id' => 'required',
        //    'bus_seat_id' => 'required',
        //    'bus_condition' => 'required',
        //    'ticket_price' => 'required',
        //    'time_shedules' => 'required',

        // ],
        // [
        //     'start_journey_city_id.required' => 'Your field is required',
        //     'stop_journey_city_id.required' => 'Your field is required',
        //     'driver_name.required' => 'Your field is required',
        //     'trip_date.required' => 'Your field is required',
        //     'bus_name_id.required' => 'Your field is required',
        //     'bus_seat_id.required' => 'Your field is required',
        //     'bus_condition.required' => 'Your field is required',
        //     'ticket_price.required' => 'Your field is required',
        //     'time_shedules.required' => 'Your field is required',
        // ]);

        $jounryStartPoint = $request->input('start_journey_city_id');
        $jounryEndingPoint = $request->input('stop_journey_city_id');
        $driverName = $request->input('driver_id');
        $tripDate = $request->input('trip_date');
        $busName = $request->input('bus_name_id');
        $busSeat = $request->input('bus_seat_id');
        $time = $request->input('bus_time_id');
        $busCondition = Str::upper($request->input('bus_condition'));
        $ticketPrice = $request->input('ticket_price');

        Trip::create([
            'start_journey_city_id' => $jounryStartPoint,
            'stop_journey_city_id' => $jounryEndingPoint,
            'driver_id' => $driverName,
            'trip_date' => $tripDate,
            'bus_name_id' => $busName,
            'bus_seat_id' => $busSeat,
            'bus_time_id' => $time,
            'bus_condition' => $busCondition,
            'ticket_price' => $ticketPrice,
        ]);

        return back()->withSuccess('Trip Addded Successfully');

        
    }

    /**
     * Display the specified resource.
     */
    public function ticket_sell(Trip $trip, $tick_sell_id)
    {
        return $tick_sell_id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
