<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Location;
use App\Models\Region;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departments.find');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function find(Request $request)
    {
        $regionSet = !empty($request->get('region_name'));
        $countrySet = !empty($request->get('country_name'));

        if (!$regionSet && !$countrySet) {
            return Response::json(["success"=>false,"message"=>'At least one parameter needs to be supplied!']);
        }

        $countries = [];

        if ($regionSet) {
            $region = Region::where('region_name', $request->get('region_name'))->first();
            $countries = Country::where('region_id', $region->region_id)->get();
        }

        if ($countrySet) {
            $countries[] = Country::where('country_name', $request->get('country_name'))->first();
        }

        $countryIDs = [];
        $countriesNames = [];
        $countriesRegions = [];
        $countriesRegionsHelp = [];
        foreach ($countries as $country) {
            $countryIDs[] = $country->country_id;
            $countriesRegions["$country->country_id"] = $country->region_id;
            $countriesRegionsHelp[] = $country->region_id;
            $countriesNames["$country->country_id"] = $country->country_name;
        }
        $regions = Region::whereIn('region_id', $countriesRegionsHelp)->get();
        $regionsNames = [];
        foreach ($regions as $region) {
            $regionsNames["$region->region_id"] = $region->region_name;
        }


        $locations = Location::whereIn('country_id', $countryIDs)->get();
        $locationCountries = [];

        foreach ($locations as $location) {
            $locationIDs[] = $location->location_id;
            $locationCountries["$location->location_id"] = $location->country_id;
        }

        $departments = Department::whereIn('location_id', $locationIDs)->get();

        $responseObjects = [];

        foreach ($departments as $department) {
            $responseObject = new \stdClass();
            $responseObject->department_name = $department->department_name;
            
            $countryId = $locationCountries[$department->location_id];
            $responseObject->country_name = $countriesNames[$countryId];

            $regionId = $countriesRegions["$countryId"];
            $responseObject->region_name = $regionsNames["$regionId"];

            $responseObjects[] = $responseObject;
        }
        return view('departments.response', compact('responseObjects'));
     }
}
