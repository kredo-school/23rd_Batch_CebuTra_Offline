<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display the dashboard home page with trips.
     */
    public function index()
    {
        $trip1 = new Trip([
            'title' => 'Oslob Whale Shark Tour',
            'trip_date' => '2026-06-15',
            'max_participants' => 6,
            'location' => 'Oslob'
        ]);
        
        $trip2 = new Trip([
            'title' => 'Mactan Island Island Hopping',
            'trip_date' => '2026-07-05',
            'max_participants' => 4,
            'location' => 'Mactan'
        ]);

        $upcomingTrips = collect([$trip1, $trip2]);

        return view('home', compact('upcomingTrips'));
    }

    /**
     * Search for trips.
     */
    public function search()
    {
        return view('home', ['upcomingTrips' => collect()]);
    }

    /**
     * Store a new trip.
     */
    public function store(Request $request)
    {
        return redirect()->route('home')->with('status', 'Trip posted successfully!');
    }

    /**
     * Join a trip.
     */
    public function join($id)
    {
        return redirect()->route('home')->with('status', 'Joined trip successfully!');
    }
}
