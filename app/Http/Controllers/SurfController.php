<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = \App\Destination::all();

        return view('search.index', compact('destinations'));
    }

    public function show(Request $request)
    {
        $price_min = $request->price_min;
        $price_max = $request->price_max;
        $start = $request->start;
        $end = $request->end;

        $camps = \App\Camp::
            where('destination_id', $request->destination)
            ->whereHas('terms', function($query) use ($price_min, $price_max, $start, $end){
                return $query
                    ->where('price', '>=', $price_min)  
                    ->where('price', '<=', $price_max)
                    ->where('start', '<=', $start)
                    ->where('end', '>=', $end);
            })
            ->with('terms')->get();

        return $camps;

        return view('search.show', compact('camps'));
    }
}
