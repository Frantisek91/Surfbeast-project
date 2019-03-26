<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;
use App\Camp;
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
        /* $camps = Camp::select(['*', 
            DB::raw('(select AVG(`rating`) from `reviews` where `reviews`.`camp_id` = `camps`.`id`) as average_review')
        ])
        ->with('reviews')    
        ->orderByRaw('average_review DESC')
        ->limit(3)
        ->get(); */

        return view('search.index', compact('destinations', "camps"));
    }

    public function show(Request $request)
    {
        $destination = \App\Destination::where('id', $request->destination_id)->first();
        $destinations = \App\Destination::all();

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

        $sort = $request->input('sort', 'start-asc');
        $sortArray = explode('-', $sort);

        $camps = \App\Camp::
            where('destination_id', $request->destination_id)
            ->whereHas('terms', function ($query) use ($price_min, $price_max, $start, $end) {
                $query 
                ->where('start', '>=', $start)
                ->where('end', '<=', $end)
                ->where('price', '>=', $price_min) 
                ->where('price', '<=', $price_max);                    
            })
            ->with(['terms' => function($q) use ($price_min, $price_max, $start, $end, $sortArray){
                return $q
                    ->where('start', '>=', $start)
                    ->where('end', '<=', $end)
                    ->where('price', '>=', $price_min) 
                    ->where('price', '<=', $price_max)
                    ->orderBy($sortArray[0], $sortArray[1]);
            }])->get();

        return view('search.show', compact('camps', 'destination', 'destinations', 'price_min', 'price_max', 'start', 'end', 'sort'));
    }
}
