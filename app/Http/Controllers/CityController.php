<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCities = City::all();
        return view('Backend.city.index', compact(['allCities']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.city.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_name' => 'required || unique:cities,city_name',
        ],[
            'city_name.required' => "City Name is required",
            'city_name.unique' => "City Name already taken",
        ]);

        $cityName = Str::upper($request->input('city_name'));
        
        //inset data into database
        City::insert([
            'city_name' => $cityName
        ]);
        return back()->withSuccess("City Insertd Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city, $city_view_id)
    {
         $cities = City::find($city_view_id);
        return view('Backend.city.view', compact(['cities']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city, $city_edit_id)
    {
        $city =  City::find($city_edit_id);
        return view('Backend.city.edit', compact('city'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city, $city_update_id)
    {
        $cityInput = $request->input('update_city_name');
        $cityName = Str::upper($cityInput);
        City::find($city_update_id)->update([
            'city_name' => $cityName
        ]);
        return back()->withSuccess("City Name Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
