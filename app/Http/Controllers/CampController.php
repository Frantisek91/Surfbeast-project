<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;
use App\Agency;
use App\Destination;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camps = Camp::all();
        $agencies = Agency::all();
        $destinations = Destination::all();
        $destination_camps = Destination::find(1)->camps;
        
        return view('camps/index', compact('camps', 'agencies', 'destinations', 'destination_camps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();
        $destinations = Destination::all();

        return view('camps/create', compact('agencies', 'destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camp = new Camp();
        $camp->agency_id = $request->agency_id;
        $camp->destination_id = $request->destination_id;
        $camp->description = $request->description;

        $camp->save();

        return redirect(action("CampController@index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $camp = Camp::findOrFail($id);

        return view('camps/show', compact('camp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camp = Camp::findOrFail($id);

        return view('camps/edit', compact('camp', 'agencies', 'destinations'));
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
        $camp = Camp::findOrFail($id);
        $camp->agency_id = $request->agency_id;
        $camp->destination_id = $request->destination_id;
        $camp->description = $request->description;

        $camp->save();

        return redirect(action("CampController@index"));
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
