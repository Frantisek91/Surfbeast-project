<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;
use Illuminate\Support\Facades\DB;

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
        DB::enableQueryLog();
        $price_min = $request->price_min;
        if (empty($price_min)) {
            $price_min = 0;
        }
        $price_max = $request->price_max;
        if (empty($price_max)) {
            $price_max = Term::max("price");
        }
        $start = $request->start;
        if (empty($start)) {
            $start = date("Y-m-d");
        }
        $end = $request->end;
        if (empty($end)) {
            $end = Term::max('end');
        }

        $camps = \App\Camp::
            where('destination_id', $request->destination_id)
            ->with(['terms' => function($q) use ($price_min, $price_max, $start, $end){
                return $q
                    ->where('start', '>=', $start)
                    ->where('end', '<=', $end)
                    ->where('price', '>=', $price_min) 
                    ->where('price', '<=', $price_max);
            }])->get();
            
        return view('search.show', compact('camps'));
    }
}
