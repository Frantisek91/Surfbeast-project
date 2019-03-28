<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;
use App\Camp;
use App\Term;
use App\Mail\InquiryCreated;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $inquiries = Inquiry::orderBy("created_at", "asc")->get();

        return view ("inquiries.index", compact("inquiries"));
    }

    public function resolved()
    {        
        $inquiries = Inquiry::orderBy("updated_at", "desc")->where("resolved", true)->get();

        return view ("inquiries.resolved", compact("inquiries"));
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
    public function store(Request $request, $id)
    {
        $term = Term::findOrFail($id);
        $inquiry = new Inquiry();

        $inquiry->term_id = $term->id;
        $inquiry->f_name = $request->f_name;
        $inquiry->l_name = $request->l_name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->message = $request->message;
        
        $inquiry->save();

        \Mail::to($inquiry->email)->send(
            new InquiryCreated($inquiry)
        );

        session()->flash('success_message', 'Poptávka zaslána');
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
        $inquiry = Inquiry::findOrFail($id);
       // dd($term);
        //$camp = Camp::where("id", $term->camp_id)->get();
        

        return view ("inquiries.show", compact("inquiry"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        return view('inquiries.edit', compact('inquiry'));
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
        $inquiry = Inquiry::findOrFail($id);

        $inquiry->resolved = $request->resolved;
        $inquiry->comment = $request->comment;
        

        $inquiry->save();

        session()->flash('success_message', 'Zpracováno');
        return redirect(action("InquiryController@resolved"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);  
        $inquiry->delete();
        session()->flash('delete_message', 'Smazáno');
        return redirect()->back();
    }
}
