<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Review;
use App\User;

class ReviewsController extends Controller
{
    public function index(Review $review)
    {
        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $review = $request->all();
        $review['user_id'] = Auth::user()->id;
        $review['name'] = Auth::user()->name;
        $review['camp_id'] = 1;

        Review::create($review);

        return redirect('/reviews')->with('success', 'Review Created');
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

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect('/reviews');
    }
}
