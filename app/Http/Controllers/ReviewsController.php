<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Review;
use App\User;
use App\Camp;


class ReviewsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->except('index');
    }

    public function index(Review $review)
    {
        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }


    public function store(Camp $camp) 
    {
       
        Review::create([
            "camp_id" => $camp->id,
            "user_id" => Auth::user()->id,
            "rating" => request("rating"),
            "description" => request("description")
        ]);

        session()->flash('success_message', 'Komentář přidán');
        return redirect(action("CampController@show", $camp->id));
    }

    public function show(Review $review)
    {
        return view('/reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('/reviews.edit', compact('review'));
    }

    public function update(Review $review)
    { 
        return redirect('/projects'); 
    }

    public function destroy($id)
    {   
        $review = Review::findOrFail($id);  
        $review->delete();
        session()->flash('delete_message', 'Smazáno');
        return redirect()->back();
      }
}
