<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allDrivers = Driver::all();
        return view('Backend.driver.index', compact(['allDrivers']));
    }

    /**
     * Show the form for creating a new Driver.
     */
    public function create()
    {
        $allBuses = Bus::all();
        return view('Backend.driver.create', compact(['allBuses']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // $request->validate(
        //     [
        //         'bus_id'  => 'required',
        //         'bus_driver_name'        => 'required',
        //         'bus_driver_mobile_no'   => 'required || unique: drivers, bus_driver_mobile_no',
        //         'bus_driver_image'       => 'required',

        //     ],
        //     [
        //         'bus_id.required' => "Your Input field is required",
        //         'bus_driver_name.required' => "Your Input field is required",
        //         'bus_driver_mobile_no.required' => "Your Input field is required",
        //         'bus_driver_mobile_no.unique' => "Mobile Number already taken",
        //     ]);


            $busId = $request->input('bus_id');
            $driverName = $request->input('bus_driver_name');
            $driverNameUpper = Str::upper($driverName);
            $driverNumber = $request->input('bus_driver_mobile_no');
            $driverImageFile  = $request->file('bus_driver_image');
            $driverImageFileOrginalName = $driverImageFile->getClientOriginalName();
            $driverImageFileOrginalNameExplode = explode(".",$driverImageFileOrginalName);
            $driverImageFileOrginalNameExplodeName = $driverImageFileOrginalNameExplode[0] ;
            $driverImageFileOrginalNameExplodeExtension = $driverImageFileOrginalNameExplode[1] ;
            
            $driverImage = 'Deiver'.'-'.time().'-'.$driverImageFileOrginalNameExplodeName.'.'.$driverImageFileOrginalNameExplodeExtension;
            $driverImageUppder = Str::upper($driverImage);
            $driverImageFile->move(public_path('uploads/backend/driver/profile'), $driverImageUppder);
            

            Driver::create([
                'bus_id' => $busId,
                'bus_driver_name' =>$driverNameUpper, 
                'bus_driver_mobile_no' =>$driverNumber,
                'bus_driver_image' => $driverImageUppder 
            ]);

            return back()->withSuccess("Driver added Successfully");
           
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver, $driver_view_id)
    {
        $driver = Driver::find($driver_view_id);
        $allBuses = Bus::all();
        return view('Backend.driver.view', compact(['driver', 'allBuses']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver, $driver_update_id)
    {
        
        $busIdUpdate = $request->input('update_bus_id');
        $driverName = $request->input('update_bus_driver_name');
        $driverNameUpdateUpper = Str::upper($driverName);
        $driverUpdateNumber = $request->input('update_bus_driver_mobile_no');
         
        Driver::find($driver_update_id)->update([
        'bus_id' => $busIdUpdate,
        'bus_driver_name'=> $driverNameUpdateUpper,
        'bus_driver_mobile_no' => $driverUpdateNumber,
       ]);

       return back()->withSuccess('Driver Info Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
