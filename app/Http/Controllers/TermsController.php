<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;
use App\Camp;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $camp = Camp::findOrFail($id);

        return view('terms/create', compact('camp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $camp = Camp::findOrFail($id);
        $term = new Term();

        $term->camp_id = $camp->id;
        $term->start = $request->start;
        $term->end = $request->end;
        $term->price = $request->price;

        $term->save();
        session()->flash('success_message', 'Termín přidán');
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
        $camps = Camp::all();
        $term = Term::findOrFail($id);

        return view('terms/edit', compact('camps', 'term'));
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
        
        $term = Term::findOrFail($id);

        $term->start = $request->start;
        $term->end = $request->end;
        $term->price = $request->price;

        $term->save();

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
        $Term = Term::findOrFail($id);  
        $Term->delete();
        session()->flash('delete_message', 'Smazáno');
        return redirect()->back();
    }
}
