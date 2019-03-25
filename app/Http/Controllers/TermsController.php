<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;
use App\Term;

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
    public function create()
    {
        $camps = Camp::all();

        return view('terms/create', compact('camps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $term = new Term();
        $term->camp_id = $request->camp_id;
        $term->start = $request->start;
        $term->end = $request->end;
        $term->price = $request->price;

        $term->save();
        session()->flash('success_message', 'Termín přidán');
        return redirect()->back();
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
        $term->camp_id = $request->camp_id;
        $term->start = $request->start;
        $term->end = $request->end;
        $term->price = $request->price;

        $term->save();
        session()->flash('success_message', 'Upraveno');
        return redirect(action('TermsController@create'));
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
        session()->flash('delete_message', 'Termín smazán');
        return redirect()->back();
    }
}
