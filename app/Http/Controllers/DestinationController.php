<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $destinations = Destination::all();
        return view ("destinations.index", compact("destinations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("destinations.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ["required"],
            "description" => ["required"]
        ]);

        $destination = Destination::create($data);
        session()->flash('success_message', 'Destinace přidána');   
        return redirect(action("DestinationController@index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        
        return view("destinations.show", compact("destination"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::findOrFail($id);

        return view("destinations.edit", compact("destination"));
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
        $destination = Destination::findOrFail($id)->update($request->validate([
            "name" => ["required"],
            "description" => ["required"]
        ]));
        session()->flash('success_message', 'Destinace upravena');
        return redirect(action("DestinationController@index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = Destination::findOrFail($id)->delete();
        session()->flash('delete_message', 'Destinace smazána');
        return redirect(action("DestinationController@index"));
    }
}
