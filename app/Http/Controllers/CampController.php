<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;
use App\Agency;
use App\Destination;

use Illuminate\Support\Facades\DB;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all()
    {
        $camps = Camp::orderBy("name", "asc")->get();
        return view ("camps.all", compact("camps"));
    }

    public function index()
    {
        
        $camps = Camp::select(['*', 
            DB::raw('(select AVG(`rating`) from `reviews` where `reviews`.`camp_id` = `camps`.`id`) as average_review')
        ])
        ->with('reviews')    
        ->orderByRaw('average_review DESC')
        ->limit(3)
        ->get();

        /* return $camps; */

        return view('camps/index', compact("camps"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::orderBy("name", "asc")->get();
        $destinations = Destination::orderBy("name", "asc")->get();

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
        $camp->name = $request->name;
        $camp->description = $request->description;
        $camp->accommodation = $request->accommodation;
        $camp->catering = $request->catering;
        $camp->transport = $request->transport;
        $camp->insurance = $request->insurance;
        $camp->transfer = $request->transfer;
        $camp->schedule = $request->schedule;
        $camp->surf_lessons = $request->surf_lessons;
        $camp->equipment = $request->equipment;
        $camp->skill_level = $request->skill_level;
        $camp->instructors = $request->instructors;
        $camp->image_url_1 = $request->image_url_1;
        $camp->image_url_2 = $request->image_url_2;
        $camp->image_url_3 = $request->image_url_3;
        $camp->image_url_4 = $request->image_url_4;
        $camp->image_url_5 = $request->image_url_5;
        $camp->url = $request->url;
        $camp->url_msw = $request->url_msw;

        $camp->save();
        session()->flash('success_message', 'Kemp přidán');
        return redirect(action("CampController@all"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $camp->name = $request->name;
        $camp->description = $request->description;
        $camp->accommodation = $request->accommodation;
        $camp->catering = $request->catering;
        $camp->transport = $request->transport;
        $camp->insurance = $request->insurance;
        $camp->transfer = $request->transfer;
        $camp->schedule = $request->schedule;
        $camp->surf_lessons = $request->surf_lessons;
        $camp->equipment = $request->equipment;
        $camp->skill_level = $request->skill_level;
        $camp->instructors = $request->instructors;
        $camp->image_url_1 = $request->image_url_1;
        $camp->image_url_2 = $request->image_url_2;
        $camp->image_url_3 = $request->image_url_3;
        $camp->image_url_4 = $request->image_url_4;
        $camp->image_url_5 = $request->image_url_5;
        $camp->url = $request->url;
        $camp->url_msw = $request->url_msw;

        $camp->save();
        session()->flash('success_message', 'Upraveno');
        return redirect(action("CampController@all"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Camp = Camp::findOrFail($id);  
        $Camp->delete();
        session()->flash('delete_message', 'Kemp smazán');
        return redirect()->back();
    }
}
