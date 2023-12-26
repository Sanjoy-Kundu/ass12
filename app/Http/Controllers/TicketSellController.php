<?php

namespace App\Http\Controllers;

use App\Models\TicketSell;
use App\Models\Bus;
use App\Models\Trip;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TicketSellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passengers = TicketSell::all();
        return view('Backend.sell.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,$ticketSell)
    {
        
       $sellTicket = Trip::find($ticketSell);
       return view('Backend.sell.create', compact('sellTicket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $name = $request->input('passenger_name');
        $passengerName = Str::upper($name);


        $totalSeats = $request->input('total_seats');
        $passengerSeats = $request->input('passenger_seats');
        //$reminderSeats = $totalSeats - $passengerSeats;
        $bus_id = $request->input('bus_id');
        $mainBusSeats =  Bus::find($bus_id)->bus_total_seats;


        $reminderSeat = $mainBusSeats - $passengerSeats;
        $seatPrice = $request->input('seat_price');
        $toalAmount  = $passengerSeats * $seatPrice;

        TicketSell::create([
            'bus_id' => $bus_id,
            'total_seats' => $totalSeats,
            'seat_price' => $request->input('seat_price'),
            'passenger_seats' => $request->input('passenger_seats'),
            'passenger_name' => $passengerName,
            'passenger_number' => $request->input('passenger_number'),
            'total_amount' => $toalAmount,
        ]);



        Bus::find($bus_id)->update([
            'bus_total_seats' => $reminderSeat
        ]);
        
        return back()->withSuccess('Your Ticket Purches Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketSell $ticketSell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketSell $ticketSell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketSell $ticketSell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketSell $ticketSell)
    {
        //
    }
}
