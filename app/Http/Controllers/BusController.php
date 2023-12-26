<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BusController extends Controller
{
   /**
     * Display a listing of bus.
     */
    public function index()
    {
        $allBuses = Bus::all();
        return view('Backend.bus.index', compact(['allBuses']));
    }

    /**
     * Show the form for creating a new bus registration.
     */
    public function create()
    {
        return view('Backend.bus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'bus_name' => 'required',
        'bus_registration_no' => 'required || unique:buses,bus_registration_no',
        'bus_image' => 'required',
       ],[
        'bus_name.required.required' => 'Bus name field is required',
        'bus_registration_no.unique' => 'Bus registation number already exit',
        'bus_registration_no.required' => 'Bus registration field is required',
        'bus_image.required' => 'Please choose an image',
       ]);


        $imageFile =  $request->file('bus_image');
        $ImageExtension = $imageFile->extension();
        $imageOrginalName = $imageFile->getClientOriginalName();
        $imageNameExplode = explode('.', $imageOrginalName);
        $imageName = $imageNameExplode[0];

        $BusImage            = 'bus-'.time().'-'.$imageName.'.'.$ImageExtension;
        $imageFile->move(public_path('uploads/backend/bus/main'), $BusImage);


        $BusName             = $request->input('bus_name');
        $BusRegistratioNo    = $request->input('bus_registration_no');
        $BusRegistratioNoUpper = Str::upper($BusRegistratioNo);
        $BusTotalSeats       = $request->input('bus_total_seats');

        Bus::create([
            'bus_name' => $BusName,
            'bus_registration_no' => $BusRegistratioNoUpper,
            'bus_image' => $BusImage,
            'bus_total_seats' => $BusTotalSeats
           ]);


           return back()->withSuccess("Bus Registration Successfully");
    }

    /**
     * Display the specified bus information.
     */
    public function show(Bus $bus, $bus_id)
    {
        $singleBus = Bus::find($bus_id);
        return view('Backend.bus.view', compact(['singleBus']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus, $bus_edit_id)
    {
        $busInfo = Bus::find($bus_edit_id);
        return view('Backend.bus.edit', compact(['busInfo']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus, $bus_update_id)
    {
        
        Bus::find($bus_update_id)->update([
            'bus_name'            => $request->input('update_bus_name'),
            'bus_registration_no' => $request->input('update_bus_registration_no'),
            'bus_total_seats'     => $request->input('update_bus_total_seats'),
        ]);
        return back()->withSuccess('Bus Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
